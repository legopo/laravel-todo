<?php

namespace App\Services;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskService
{
    use Service;

    private $task;

    public function __construct(
        Task $task,
    ) {
        $this->task = $task;
    }

    /**
     * 一覧取得クエリ生成
     *
     * @param Request $request
     * @param integer $groupId
     * @return object
     */
    public function makeIndexQuery(Request $request, int $groupId): object
    {
        // クエリ生成
        $query = $this->task
            ->sortable()
            ->where('group_id', $groupId)
            ->orderBy('created_at', 'desc');

        return $query;
    }
}
