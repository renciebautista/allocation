<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('group');
			$table->string('area_code');
			$table->string('area_desc');
			$table->string('sold_to_code')->nullable();
			$table->string('customer_code')->nullable();
			$table->string('customer_name');
			$table->string('ship_to_code')->nullable();
			$table->string('ship_to_name')->nullable();
			$table->string('account_group')->nullable();
			$table->string('dt_channel')->nullable();
			$table->boolean('account_name')->nullable();
			$table->boolean('active');
			$table->decimal('split',3,2)->nullable();
			$table->string('alternative_sold_to')->nullable();
			$table->boolean('with_allocation');
			$table->boolean('ship_to_y');
			$table->string('ship_to')->nullable();
			$table->boolean('outlet');
			$table->boolean('dt_channel_included');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('customers');
	}

}
