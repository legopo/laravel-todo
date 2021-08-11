<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Services\TagService;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Tag extends Model
{
    use HasFactory;

    /**
     * 指定テーブル
     *
     * @var string
     */
    protected $table = 'tags';

    /**
     * 変更可能カラム
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * タスク-タグリレーション
     *
     * @return object
     */
    public function taskTags(): object
    {
        return $this->belongsToMany(Task::class, 'task_tags')->withTimestamps();
    }

    /**
     * ハッシュタグの保存
     *
     * @param Task $task
     * @return void
     */
    public function storeTags(Task $task): void
    {
        // ハッシュタグ部分を抜き出す
        $tagService = new TagService;
        $tags = $tagService->extractTags($task->detail);

        if (!empty($tags)) {
            // すでに存在しているタグを除いて、新規のタグ保存用の配列に作る
            $duplicateTags = Tag::select('name')
                ->whereIn('name', $tags)
                ->get()
                ->pluck('name')
                ->toArray();

            $newTags = array_diff($tags, $duplicateTags);
            //

            // tagsへバルクインサート
            $data = [];
            $now = Carbon::now()->format('Y-m-d H:i:s');

            foreach ($newTags as $tag) {
                $data[] = [
                    'name' => $tag,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }

            DB::table('tags')->insert($data);
            //
        }

        // 中間テーブルのsync
        $this->syncTaskTags($task, $tags);
    }

    /**
     * タスク-タグ関連の同期
     *
     * @param Task $task
     * @param array $tags
     * @return void
     */
    public function syncTaskTags(Task $task, array $tags): void
    {
        $tagIds = Tag::select('id')
            ->whereIn('name', $tags)
            ->get()
            ->pluck('id')
            ->toArray();

        $task->taskTags()->sync($tagIds);
    }
}
