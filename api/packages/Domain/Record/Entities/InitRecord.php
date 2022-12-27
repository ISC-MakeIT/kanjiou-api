<?php

namespace Packages\Domain\Record\Entities;

use Packages\Domain\GameMode\ValueObjects\GameMode;
use Packages\Domain\Record\ValueObjects\Name;
use Packages\Domain\Record\ValueObjects\SecondsLeft;

final class InitRecord {
    private GameMode $gameMode;
    private Name $name;
    private SecondsLeft $secondsLeft;

    private function __construct(
        GameMode $gameMode,
        Name $name,
        SecondsLeft $secondsLeft,
    ) {
        $this->gameMode    = $gameMode;
        $this->name        = $name;
        $this->secondsLeft = $secondsLeft;
    }

    public function gameMode(): GameMode {
        return $this->gameMode;
    }

    public function name(): Name {
        return $this->name;
    }

    public function secondsLeft(): SecondsLeft {
        return $this->secondsLeft;
    }

    public static function from(
        GameMode $gameMode,
        Name $name,
        SecondsLeft $secondsLeft,
    ): InitRecord {
        return new InitRecord(
            $gameMode,
            $name,
            $secondsLeft,
        );
    }
}
