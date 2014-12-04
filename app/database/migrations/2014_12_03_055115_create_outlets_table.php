<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOutletsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('outlets', function(Blueprint $table)
		{
			$table->string('area_code');
			$table->string('channel')->nullable();
			$table->string('customer_ship_to_code');
			$table->string('account_group');
			$table->string('account_name');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('outlets');
	}

}
