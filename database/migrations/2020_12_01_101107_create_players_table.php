<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->nullable(false)->comment('ユーザー名');
			$table->string('password', 50)->nullable(false)->comment('パスワード');
			$table->timestamp('created_at')->useCurrent()->nullable(false)->comment('作成日時');
			$table->timestamp('updated_at')->useCurrent()->nullable(false)->comment('更新日時');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
}
