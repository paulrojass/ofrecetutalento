<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100)->nullable();
            $table->string('lastname', 100)->nullable();
            $table->string('nationality', 100)->nullable();
            $table->string('address',191)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('country', 100)->nullable();
            $table->string('document',50)->nullable();
            $table->string('email', 100)->unique();
            $table->string('phone',50)->nullable();
            $table->text('abilities')->nullable();
            $table->string('provider',100)->nullable();
            $table->string('provider_id',100)->nullable();
            $table->string('avatar')->default('images/users/default.png');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('company')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
