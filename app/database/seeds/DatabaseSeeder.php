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
		$this->call('AreaGroupTableSeeder');
		$this->call('CyclesTableSeeder');
		$this->call('ActivityTypeTableSeeder');
		$this->call('ObjectiveTableSeeder');
		$this->call('ScopeTableSeeder');
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}

}
