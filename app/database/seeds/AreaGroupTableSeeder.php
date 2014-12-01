<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class AreaGroupTableSeeder extends Seeder {

	public function run()
	{
		DB::table('area_groups')->truncate();

		DB::statement("INSERT INTO area_groups (id, area_group) VALUES
			(1, 'MT'),
			(2, 'DT');");
	}

}