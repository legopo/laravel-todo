<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use App\Http\Requests\CreateGroupRequest;
use App\Http\Requests\EditGroupRequest;
use App\Services\GroupService;

class GroupController extends Controller
{
    private $group;
    private $groupService;

    public function __construct(
        Group $group,
        GroupService $groupService,
    ) {
        $this->authorizeResource(Group::class, 'group'); // 認可
        //
        $this->group = $group;
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
     * 削除
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        $this->group->destroyGroup($group);

        return redirect()->route('home');
    }
}
