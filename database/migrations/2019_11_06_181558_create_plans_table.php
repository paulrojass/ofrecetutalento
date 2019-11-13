<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 50)->nullable();
            $table->integer('monthly_price')->nullable();
            $table->integer('quarterly_price')->nullable();
            $table->integer('annual_price')->nullable();
            $table->integer('talents')->nullable();
            $table->integer('photos')->nullable();
            $table->integer('videos')->nullable();
            $table->integer('pdfs')->nullable();
            $table->integer('pdf_size')->nullable();
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
        Schema::dropIfExists('plans');
    }
}
