<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ActivityTypeTableSeeder extends Seeder {

	public function run()
	{
		DB::table('activity_types')->truncate();

		DB::statement("INSERT INTO activity_types (id, activity_type, unit_of_measurement) VALUES
			(1, 'GIS', 'CASES'),
			(2, 'ISB / IWB', 'DEALS'),
			(3, 'NPI', 'CASES'),
			(4, 'OTHER', 'CASES'),
			(5, 'PRE-BANDED', 'CASES'),
			(6, 'REDISTRIBUTION PACK', 'CASES'),
			(7, 'TRADE DEAL', 'CASES'),
			(8, 'MERCHANDISING', 'CASES'),
			(9, 'DISPLAY ALLOWNCE', 'CASES'),
			(10, 'GROWTH INCENTIVE SCHEME', 'CASES');");
	}

}