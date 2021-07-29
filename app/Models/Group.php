<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\CreateGroupRequest;
use App\Http\Requests\EditGroupRequest;

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
        'user_id',
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

    /**
     * グループの新規追加
     *
     * @param CreateGroupRequest $request
     * @return void
     */
    public function storeGroup(CreateGroupRequest $request): void
    {
        $this->create($request->validated());
    }

    /**
     * グループの更新
     *
     * @param EditGroupRequest $request
     * @param object $group
     * @return void
     */
    public function updateGroup(EditGroupRequest $request, Group $group): void
    {
        $group->fill($request->validated())->save();
    }

    /**
     * グループの削除
     *
     * @param object $group
     * @return void
     */
    public function destroyGroup(Group $group): void
    {
        
    }
}
