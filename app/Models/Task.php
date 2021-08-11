<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\EditTaskRequest;

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
        'group_id',
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
     * タスクのユーザーをグループ経由で取得する
     *
     * @param Task $task
     * @return integer
     */
    public function searchUserId(Task $task): int {
        $userId = $task->load(['group' => function ($query) {
            $query->select('id', 'user_id');
        }])
        ->group
        ->user_id;

        return $userId;
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

    /**
     * タスクの新規追加
     *
     * @param CreateTaskRequest $request
     * @param  \App\Models\Group  $group
     * @return Task
     */
    public function storeTask(CreateTaskRequest $request, Group $group): Task
    {
        return $this->create($request->all());
    }

    /**
     * タスクの更新
     *
     * @param EditTaskRequest $request
     * @param \App\Models\Task  $task
     * @return void
     */
    public function updateTask(EditTaskRequest $request, Task $task): void
    {
        $task->fill($request->all())->save();
    }
}
