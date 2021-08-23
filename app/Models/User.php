<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\EditPasswordRequest;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * 指定テーブル
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * 変更可能カラム
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * グループリレーション
     *
     * @return object
     */
    public function groups(): object
    {
        return $this->hasMany(Group::class);
    }

    /**
     *  ユーザーの更新
     *
     * @param EditUserRequest $request
     * @param \App\Models\User $user
     * @return void
     */
    public function updateUser(EditUserRequest $request, User $user): void
    {
        $user->fill($request->validated())->save();
    }

    /**
     *  パスワードの更新
     *
     * @param EditPasswordRequest $request
     * @param \App\Models\User $user
     * @return void
     */
    public function updatePassword(EditPasswordRequest $request, User $user): void
    {
        $user->password = Hash::make($request->validated()['password']);
        $user->save();
    }
}
