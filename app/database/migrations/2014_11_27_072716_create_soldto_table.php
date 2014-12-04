<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSoldtoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sold_tos', function(Blueprint $table)
		{
			$table->string('customer_code');
			$table->string('area_code');
			$table->string('soldto_code')->nullable();
			$table->string('customer_name');
			$table->index('customer_code');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sold_tos');
	}

}
