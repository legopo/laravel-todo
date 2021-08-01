<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Group;
use Illuminate\Http\Request;
use App\Services\TaskService;
use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\EditTaskRequest;

class TaskController extends Controller
{
    private $taskService;
    private $task;
    private $group;

    public function __construct(
        TaskService $taskService,
        Task $task,
        Group $group,
    ) {
        $this->taskService = $taskService;
        $this->task = $task;
        $this->group = $group;
    }

    /**
     * 一覧(GET)
     *
     * @param Request $request
     * @param integer $groupId
     * @return void
     */
    public function index(Request $request, int $groupId = null)
    {
        // ユーザーの持つグループを取得
        $groups = $this->group->getGroups(\Auth::id());

        // グループがなければreturnしてしまう
        if ($groups->isEmpty()) {
            return view('tasks/index', [
                'tasks' => [],
                'groups' => [],
                'groupId' => null
            ]);
        }

        // デフォルトとなるgroupのidをセット
        if ($groupId === null) {
            $groupId = $groups->first()->id;
        }

        // 一覧用クエリ生成
        $query = $this->taskService->makeIndexQuery($request, $groupId);
        // 一覧データ取得
        $tasks = $query->paginate(10);

        return view('tasks/index', compact(
            'tasks',
            'groups',
            'groupId'
        ));
    }

    /**
     * 新規追加(GET)
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function create(Group $group)
    {
        return view('tasks/create', compact('group'));
    }

    /**
     * 新規追加(POST)
     *
     * @param  \App\Http\Requests\CreateTaskRequest  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTaskRequest $request, Group $group)
    {
        $this->task->storeTask($request, $group);

        return redirect()->route('home');
    }

    /**
     * 詳細(GET)
     *
     * @param  \App\Models\Group  $group
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group, Task $task)
    {
        return view('tasks/show', compact(
            'group',
            'task',
        ));
    }

    /**
     * 編集(GET)
     *
     * @param  \App\Models\Group  $group
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group, Task $task)
    {
        return view('tasks/edit', compact(
            'group',
            'task'
        ));
    }

    /**
     * 編集(PUT|PATCH)
     *
     * @param  \App\Http\Requests\EditTaskRequest  $request
     * @param  \App\Models\Group  $group
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(EditTaskRequest $request,Group $group, Task $task)
    {
        $this->task->updateTask($request, $task);

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}
