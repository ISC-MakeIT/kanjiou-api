<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TimeLimit;

class TimeLimitSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		TimeLimit::factory(200)->create();
	}
}
