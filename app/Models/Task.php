<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

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
}
