<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Group;
use Illuminate\Http\Request;
use App\Services\TaskService;

class TaskController extends Controller
{
    private $taskService;
    private $group;

    public function __construct(
        TaskService $taskService,
        Group $group,
    ) {
        $this->taskService = $taskService;
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Group $group)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('tasks/show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view('tasks/edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
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
