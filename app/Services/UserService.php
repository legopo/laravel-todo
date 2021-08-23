<?php

namespace App\Services;

use Illuminate\Support\Facades\Gate;
use App\Services\TaskService;

class UserService
{
    use Service;

    public function me(int $id)
    {
        /*
        HACK:
        ポリシーにまとめたいが、Authenticatableを継承しているモデルだからリソースポリシーがうまく機能しない？ フレームワーク内部のコードを読む必要あり
        app/Providers/AuthServiceProvider.php とかでまとめて書く方法があると思う。
         */

        if (!Gate::allows('me', $id)) {
            abort(403);
        }
    }
}
