<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Task extends Model
{
    use HasFactory;
    use Sortable;

    /**
     * 指定テーブル
     *
     * @var string
     */
    protected $table = 'tasks';

    /**
     * 変更可能カラム
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'due_date',
        'detail',
        'is_important',
        'is_completed',
    ];

    /**
     * キャストする必要のある属性
     *
     * @var array
     */
    protected $casts = [
        'due_date' => 'date:Y-m-d',
    ];

    /**
     * ソート可能カラム
     *
     * @var array
     */
    public $sortable = [
        'name',
        'due_date',
        'is_important',
        'is_completed',
    ];

    /**
     * グループリレーション
     *
     * @return object
     */
    public function group(): object
    {
        return $this->belongsTo(Group::class);
    }

    /**
     * タスク-タグリレーション
     *
     * @return object
     */
    public function taskTags(): object
    {
        return $this->belongsToMany(Tag::class, 'task_tags')->withTimestamps();
    }

    /**
     * is_importantの表示用設定
     *
     * @param  string  $value
     * @return void
     */
    public function getIsImportantDispAttribute($value)
    {
        return $this->is_important === 1 ? '☆' : '';
    }

    /**
     * is_importantの表示用設定
     *
     * @param  string  $value
     * @return void
     */
    public function getIsCompletedDispAttribute($value)
    {
        return $this->is_completed === 1 ? '完了' : '未完了';
    }
}
