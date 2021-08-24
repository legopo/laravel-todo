# laravel-todo

Laravelで作るシンプルなCRUDアプリ

Laravelを業務で初めて使用した時とその次に参加したプロジェクトで、
各箇所をどのようにキャッチアップしつつ進めてその中で思ったことと、各機能実装のチケットを[Issues](https://github.com/legopo/laravel-todo/issues)に書き、それをベースにtodoアプリを作成。

* 基本的に[公式](https://readouble.com/laravel/8.x/ja/)を参照する。
* best practices, patterns, examples　とかで検索すると、こう書いた方がいい的なのがまとまったサイトがヒットしたりするのでそちらも参考にする。　初めてのキャッチアップの時には[laravel-best-practices](https://github.com/alexeymezenin/laravel-best-practices/blob/master/japanese.md) を参照。複数人で共有する前提で分量的にも内容的にもちょうどいいものだった。


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
$ cp .env.example .env
$ composer install
$ sail up -d

http://localhost:8080
で起動の確認

$ sail artisan migrate
$ sail artisan db:seed
```

email: test@test.test
<br>
pass : password


# Note
## 機能
### ユーザー
- 登録, 編集
- パスワードリセット
 ### グループ
- 登録, 編集, 削除
### タスク
- 一覧(ソート、ページング)、登録, 編集, 削除
- 未完了 or 完了
- 重要フラグ設定
- 期日の設定
- 詳細欄でハッシュタグを登録

## テーブル定義

[テーブル定義](https://github.com/legopo/laravel-todo/issues/3)

# References
