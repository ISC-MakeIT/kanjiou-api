<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Packages\Infrastructure\EloquentModels\TimeLimit\TimeLimit;

class TimeLimitSeeder extends Seeder
{
	public function run()
	{
		TimeLimit::factory(200)->create();
	}
}
