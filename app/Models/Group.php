<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    /**
     * 指定テーブル
     *
     * @var string
     */
    protected $table = 'groups';

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
     * タスクリレーション
     *
     * @return object
     */
    public function tasks(): object
    {
        return $this->hasMany(Task::class);
    }

    /**
     * ユーザーの持つグループを取得
     *
     * @param integer $userId
     * @return object
     */
    public function getGroups(int $userId): object {
        $groups = $this
            ->where('user_id', $userId)
            ->orderBy('id', 'asc')
            ->get();

        return $groups;
    }
}
