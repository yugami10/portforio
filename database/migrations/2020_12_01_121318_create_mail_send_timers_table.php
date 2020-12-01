<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailSendTimersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_send_timers', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('mail_id')->nullable(false)->comment('メールID');
			$table->boolean('everyday_flag')->nullable(true)->comment('毎日送信フラグ');
			$table->string('day_of_week', 1)->nullable(true)->comment('毎週送信する曜日');
			$table->dateTime('send_time')->nullable(false)->comment('送信時間');
			$table->timestamp('created_at')->useCurrent()->nullable(false)->comment('作成日時');
			$table->timestamp('updated_at')->useCurrent()->nullable(false)->comment('更新日時');
			$table->softDeletes()->comment('削除日時');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mail_send_timers');
    }
}
