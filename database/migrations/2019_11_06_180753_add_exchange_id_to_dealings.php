<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExchangeIdToDealings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dealings', function (Blueprint $table) {
            $table->unsignedBigInteger('accept_id');
            $table->foreign('accept_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dealings', function (Blueprint $table) {
            $table->dropForeign(['accept_id']);
            $table->dropColumn('accept_id');
        });
    }
}
