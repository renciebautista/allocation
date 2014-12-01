<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CyclesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('cycles')->truncate();

		DB::statement("INSERT INTO cycles (id, cycle_name, month_id) VALUES
			(1, 'TEST CYCLE', 1),
			(2, 'NEW CYCLE', 5);");
	}

}