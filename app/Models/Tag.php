<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Services\TagService;

class Tag extends Model
{
    use HasFactory;

    private $tagService;

    public function __construct(TagService $tagService) {
        $this->tagService = $tagService;
    }

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
    public function storeTags(Task $task): void {
        // ハッシュタグ部分を抜き出す
        $tags = $this->tagService->extractTags($task->detail);

        //バリデーション入れる

        // tagsへの保存 // MEMO: ループで何回もSQLをして負担を増やさないようにバルクインサートする
        $data = [];
        foreach ($tags as $tag) {
            $data[] = [
                'name' => $tag,
            ];
        }

        Tag::insert($data);
        //

        // 中間テーブルへのattatch?
    }
}
