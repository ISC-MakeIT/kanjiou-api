<?php

namespace Packages\Domain\Rank\Entities;

use Packages\Domain\GameMode\ValueObjects\GameMode;
use Packages\Domain\Rank\ValueObjects\Name;
use Packages\Domain\Rank\ValueObjects\SecondsLeft;

final class InitRank {
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
    ): InitRank {
        return new InitRank(
            $gameMode,
            $name,
            $secondsLeft,
        );
    }
}
