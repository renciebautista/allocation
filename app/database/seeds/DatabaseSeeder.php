<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		$this->call('ScopeTableSeeder');
		$this->call('ObjectiveTableSeeder');
		$this->call('MtPrimarySalesTableSeeder');
		$this->call('DtSecondarySalesTableSeeder');
		$this->call('ShipToSalesTableSeeder');
		$this->call('OutletSalesTableSeeder');
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}

}
