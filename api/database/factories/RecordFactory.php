<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Packages\Infrastructure\EloquentModels\GameMode\GameMode;
use Packages\Infrastructure\EloquentModels\Record\Record;
use Illuminate\Support\Str;

class RecordFactory extends Factory {
    protected $model = Record::class;

    public function definition(): array {
        return [
            'game_mode_id' => GameMode::first()->game_mode_id,
            'name'         => Str::random($this->faker->numberBetween(1, 8)),
            'seconds_left' => $this->faker->numberBetween(5, 35),
        ];
    }
}
