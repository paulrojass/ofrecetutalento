<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company1', 50)->nullable();
            $table->string('position1', 50)->nullable();
            $table->date('start_date1')->nullable();
            $table->date('due_date1')->nullable();
            $table->text('achievements1')->nullable();
            $table->string('company2', 50)->nullable();
            $table->string('position2', 50)->nullable();
            $table->date('start_date2')->nullable();
            $table->date('due_date2')->nullable();
            $table->text('achievements2')->nullable();
            $table->string('company3', 50)->nullable();
            $table->string('position3', 50)->nullable();
            $table->date('start_date3')->nullable();
            $table->date('due_date3')->nullable();
            $table->text('achievements3')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experiences');
    }
}
