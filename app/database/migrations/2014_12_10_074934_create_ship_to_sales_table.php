<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateShipToSalesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ship_to_sales', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('cmd_customer_code');
			$table->string('sku_code');
			$table->decimal('gsv', 15, 2);
			$table->index('cmd_customer_code');
			$table->index('sku_code');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ship_to_sales');
	}

}
