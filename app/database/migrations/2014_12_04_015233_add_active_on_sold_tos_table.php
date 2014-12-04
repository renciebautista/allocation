<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddActiveOnSoldTosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sold_tos', function(Blueprint $table)
		{
			$table->boolean('active')->default(0);
			$table->dropColumn('soldto_code');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('sold_tos', function(Blueprint $table)
		{
			$table->dropColumn('active');
			$table->string('soldto_code')->after('area_code');
		});
	}

}
