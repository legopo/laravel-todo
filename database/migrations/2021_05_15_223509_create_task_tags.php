<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_tags', function (Blueprint $table) {
            $table->id();
            $table->foreignId('task_id')->constrained();
            $table->foreignId('tag_id')->constrained();
            $table->timestamps();
        });

        DB::statement("ALTER TABLE lists COMMENT 'ユーザー'");
        DB::statement("ALTER TABLE lists COMMENT 'リスト'");
        DB::statement("ALTER TABLE tasks COMMENT 'タスク'");
        DB::statement("ALTER TABLE tags COMMENT 'タグ'");
        DB::statement("ALTER TABLE task_tags COMMENT 'タスク・タグ管理'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_tags');
    }
}
