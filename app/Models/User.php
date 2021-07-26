<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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
     * タグリレーション
     *
     * @return object
     */
    public function tags(): object
    {
        return $this->hasMany(Tag::class);
    }
}
