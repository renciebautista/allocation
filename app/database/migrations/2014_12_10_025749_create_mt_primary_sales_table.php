<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMtPrimarySalesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mt_primary_sales', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('area_code');
			$table->string('customer_code');
			$table->string('sku_code');
			$table->decimal('gsv', 15, 2);
			$table->index('area_code');
			$table->index('customer_code');
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
		Schema::drop('mt_primary_sales');
	}

}
