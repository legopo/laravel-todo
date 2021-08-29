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
     * 選択タグのタスク一覧を取得
     *
     * @param string $tag
     * @param int $userId
     * @return object
     */
    public function getTaggedTasks(string $tag, int $userId): object
    {
        $tagId = $this->where('name', $tag)
            ->first('id')
            ->id;

        /* 取得 */
        /* HACK:
        そのタグをもつ、そのユーザーのタスクを、ページネーション込みで取得する。
        がここでやりたいことだけど、中間テーブルを通じての取得で上記の条件をクリアするような記述がうまく書けなかった
        ので、現状はSQLを分ける形で書いた。
        whereで絞ってからjoinする、selectで取得するカラムを絞るなどは考慮したけど、データ量がかなり増えてきたときには遅くなる？
        */

        // ユーザーのタスクのidを取得
        $hisTaskIds = Task::join('groups', function ($join) use ($userId) {
            $join->on('groups.id', '=', 'tasks.group_id');
            $join->where('groups.user_id', '=', $userId);
        })
            ->get('tasks.id')
            ->pluck('id');

        // 該当タグの付いているタスクのidを取得
        $taggedTaskIds = TaskTag::where('tag_id', $tagId)
            ->get('task_id')
            ->pluck('task_id');

        // 該当タスクのid(重複しているidが、選択ユーザーの該当タグを持つタスクのidとなる)
        $taskIds = $hisTaskIds->merge($taggedTaskIds)
            ->duplicates()
            ->toArray();

        $tasks = Task::whereIn('id', $taskIds)->paginate(10);

        return $tasks;
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
        $tags = TagService::extractTags($task->detail);

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
