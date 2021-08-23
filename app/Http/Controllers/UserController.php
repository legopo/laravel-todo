<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\EditPasswordRequest;
use App\Services\UserService;


class UserController extends Controller
{
    private $user;
    private $userService;

    public function __construct(
        User $user,
        UserService $userService,
    ) {
        $this->user = $user;
        $this->userService = $userService;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->userService->me($id);

        $user = User::find($id);

        return view('users/show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->userService->me($id);

        $user = User::find($id);

        return view('users/edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\EditUserRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, $id)
    {
        $this->userService->me($id);

        try {
            $this->user->updateUser($request, User::find($id));
        } catch (Throwable $exception) {
            Log::error($exception->getMessage());
            abort(500);
        }

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Edit password
     *
     * @param User $user
     * @return void
     */
    public function editPassword(User $user)
    {
        $this->userService->me($user->id);

        return view('users/edit-password', compact('user'));
    }

    /**
     * Update password
     *
     * @param  \App\Http\Requests\EditPasswordRequest  $request
     * @param User $user
     * @return void
     */
    public function updatePassword(EditPasswordRequest $request, User $user)
    {
        $this->userService->me($user->id);

        try {
            $this->user->updatePassword($request, $user);
        } catch (Throwable $exception) {
            Log::error($exception->getMessage());
            abort(500);
        }

        return redirect()->route('home');
    }
}
