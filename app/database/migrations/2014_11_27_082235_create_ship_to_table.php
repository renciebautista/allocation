<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateShipToTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ship_tos', function(Blueprint $table)
		{
			$table->string('customer_code');
			$table->string('cmd_customer_code');
			$table->string('ship_to_name');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ship_tos');
	}

}
