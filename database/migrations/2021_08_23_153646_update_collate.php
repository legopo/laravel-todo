<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCollate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE failed_jobs CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;");
        DB::statement("ALTER TABLE migrations CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;");
        DB::statement("ALTER TABLE password_resets CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;");
        DB::statement("ALTER TABLE `groups` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;"); // groupsだけバッククォートをつけないとエラーになった
        DB::statement("ALTER TABLE tags CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;");
        DB::statement("ALTER TABLE task_tags CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;");
        DB::statement("ALTER TABLE tasks CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;");
        DB::statement("ALTER TABLE users CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
