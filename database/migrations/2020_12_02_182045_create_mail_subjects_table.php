<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_subjects', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('mail_id')->nullable(false)->comment('メールID');
			$table->string('subject', 100)->nullable(false)->comment('件名');
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
        Schema::dropIfExists('mail_subjects');
    }
}
