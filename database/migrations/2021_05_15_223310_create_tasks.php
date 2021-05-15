<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('list_id')->constrained();
            $table->string('name')->comment('名前');
            $table->date('due_date')->nullable()->comment('日付');
            $table->text('detail')->nullable()->comment('詳細');
            $table->integer('is_important')->default(0)->comment('重要 0:いいえ 1:はい');
            $table->integer('is_completed')->default(0)->comment('完了 0:いいえ 1:はい');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
