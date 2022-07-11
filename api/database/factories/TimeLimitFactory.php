<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Packages\Infrastructure\EloquentModels\TimeLimit\TimeLimit;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rank>
 */
class TimeLimitFactory extends Factory
{
    protected $model = TimeLimit::class;

	public function definition()
	{
		return [
			'seconds' => $this->faker->numberBetween(5, 35),
			'name'    => Str::random($this->faker->numberBetween(1, 8)),
		];
	}
}
