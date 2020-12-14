<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable(false)->comment('ユーザーID');
			$table->string('to', 100)->nullable(false)->comment('宛先');
			$table->string('content', 1000)->nullable(false)->comment('本文');
			$table->boolean('everyday_flag')->nullable(true)->comment('毎日送信フラグ');
			$table->string('day_of_week', 1)->nullable(true)->comment('毎週送信する曜日');
			$table->dateTime('send_time')->nullable(false)->comment('送信時間');
			$table->dateTime('created_at')->useCurrent()->nullable(false)->comment('作成日時');
			$table->dateTime('updated_at')->useCurrent()->nullable(false)->comment('更新日時');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mails');
    }
}
