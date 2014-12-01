<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ScopeTableSeeder extends Seeder {

	public function run()
	{
		DB::table('scopes')->truncate();

		DB::statement("INSERT INTO scopes (id, scope) VALUES
			(1, 'NATIONAL'),
			(2, 'CUSTOMIZE');");
	}

}