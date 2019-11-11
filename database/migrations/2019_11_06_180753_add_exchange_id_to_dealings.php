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
            $table->unsignedBigInteger('exchange_id');
            $table->foreign('exchange_id')->references('id')->on('users');
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
            $table->dropForeign(['exchange_id']);
            $table->dropColumn('exchange_id');
        });
    }
}
