<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNameToMailAddressTosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mail_address_tos', function (Blueprint $table) {
			$table->string('name', 50)->default('Laravel')->nullable(false)->comment('宛先の表示名');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mail_address_tos', function (Blueprint $table) {
            //
        });
    }
}
