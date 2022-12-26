<?php

namespace App\Console\Commands\Batch;

use Illuminate\Console\Command;
use Packages\Domain\GameMode\ValueObjects\GameMode as EnumGameMode;
use Packages\Infrastructure\EloquentModels\GameMode\GameMode;

class CreateGameModes_2022_12_25 extends Command {
    protected $signature   = 'batch:create_game_modes_2022_12_25';
    protected $description = 'insert init game mode data to game modes table';

    public function handle() {
        foreach ($this->gameModes() as $gameMode) {
            GameMode::create(['name' => $gameMode]);
        }

        return 0;
    }

    private function gameModes(): array {
        return [
            EnumGameMode::ONE_DOG_AMOUNG_SHEEP->ofJa(),
        ];
    }
}
