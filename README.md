# laravel-todo

Laravelで作るシンプルなCRUDアプリ

# Requirement

-   PHP 8.0.6
-   Laravel 8.41.0
-   MySQL 8.0.23

# Installation

Laravel Sailを使ったDocker環境を使用

※ sailコマンドを楽に使うために、zshrc, bashrcなどにエイリアスを登録しておく。

alias sail='bash vendor/bin/sail'

```bash
$ git clone https://github.com/legopo/laravel-todo.git
$ cd laravel-todo
$ sail up
$ sail artisan migrate
```

# Note
## 機能
### ユーザー
- 登録, 編集
- パスワードリセット
 ### リスト
- 登録, 編集, 削除
### タスク
- 登録, 編集, 削除
- 未完了 or 完了
- 重要フラグ設定
- 期日の設定
- 詳細欄でハッシュタグを登録

## テーブル定義

[テーブル定義](https://github.com/legopo/laravel-todo/issues/3)

# References
