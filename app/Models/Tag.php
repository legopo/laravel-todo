<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
     * ユーザーリレーション
     *
     * @return object
     */
    public function user(): object
    {
        return $this->belongsTo(User::class);
    }

    /**
     * タスク-タグリレーション
     *
     * @return object
     */
    public function taskTags(): object
    {
        return $this->belongsToMany(Task::class, 'task_tags')->withTimestamps();
    }
}
