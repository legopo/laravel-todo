<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\CreateGroupRequest;
use App\Http\Requests\EditGroupRequest;
use App\Services\GroupService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class GroupController extends Controller
{
    private $group;
    private $task;
    private $groupService;

    public function __construct(
        Group $group,
        Task $task,
        GroupService $groupService,
    ) {
        $this->authorizeResource(Group::class, 'group'); // 認可
        //
        $this->group = $group;
        $this->task = $task;
        $this->groupService = $groupService;
    }
    /**
     * 新規追加(GET)
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('groups/create');
    }

    /**
     * 新規追加(POST)
     *
     * @param  \App\Http\Requests\CreateGroupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateGroupRequest $request)
    {
        $this->group->storeGroup($request);

        return redirect()->route('home');
    }

    /**
     * 編集(GET)
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        return view('groups/edit', compact('group'));
    }

    /**
     * 編集(PUT|PATCH)
     *
     * @param  \App\Http\Requests\EditGroupRequest  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(EditGroupRequest $request, Group $group)
    {
        $this->group->updateGroup($request, $group);

        return redirect()->route('home');
    }

    /**
     * 削除(DELETE)
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        try {
            DB::transaction(function () use ($group) {
                // 関連タスクを削除
                foreach ($group->tasks as $task) {
                    $this->task->destroyTask($task);
                }
                // グループを削除
                $this->group->destroyGroup($group);
            });
        } catch (Throwable $exception) {
            Log::error($exception->getMessage());
            abort(500);
        }

        return redirect()->route('home');
    }
}
