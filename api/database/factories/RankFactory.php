<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Rank;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rank>
 */
class RankFactory extends Factory
{
    protected $model = Rank::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'seconds' => $this->faker->numberBetween(40, 500),
            'name' => Str::random($this->faker->numberBetween(1, 8)),
        ];
    }
}
