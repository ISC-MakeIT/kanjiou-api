<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\TimeLimit;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rank>
 */
class TimeLimitFactory extends Factory
{
	public function definition()
	{
		return [
			'seconds' => $this->faker->numberBetween(5, 35),
			'name'    => Str::random($this->faker->numberBetween(1, 8)),
		];
	}
}
