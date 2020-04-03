<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealingsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dealings', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('name',100)->nullable();
			$table->text('description')->nullable();
			$table->string('ideal',100)->nullable();
			$table->string('plus',100)->nullable();
			$table->integer('value')->nullable();
			$table->integer('quantity')->nullable();
			$table->boolean('approved')->nullable();
			$table->integer('dealing_ready')->default(0);
			$table->integer('proposal_ready')->default(0);
			$table->integer('exchange_id')->nullable();
			$table->integer('proposal_id')->nullable();
			$table->integer('exchange_days')->nullable();
			$table->integer('proposal_days')->nullable();
			$table->boolean('pay')->default(0);
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
		Schema::dropIfExists('dealings');
	}
}
