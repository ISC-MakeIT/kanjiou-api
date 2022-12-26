<?php

namespace App\Console\Commands\Batch;

use Illuminate\Console\Command;
use Packages\Infrastructure\EloquentModels\GameMode\GameMode;

class CreateGameModes_2022_12_25 extends Command {
    protected $signature   = 'batch:create_game_modes_2022_12_25';
    protected $description = 'insert init game mode data to game modes table';

    private array $gameModes = [
        'oneDogAmoungSheep',
    ];

    public function handle() {
        foreach ($this->gameModes as $gameMode) {
            GameMode::create(['name' => $gameMode]);
        }

        return 0;
    }
}
