<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOutletSalesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('outlet_sales', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('area_code');
			$table->string('customer_ship_to_code');
			$table->string('sku_code');
			$table->decimal('gsv', 15, 2);
			$table->index('area_code');
			$table->index('customer_ship_to_code');
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
		Schema::drop('outlet_sales');
	}

}
