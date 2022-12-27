<?php

namespace Packages\Domain\Rank\Entities;

use Packages\Domain\GameMode\ValueObjects\GameMode;
use Packages\Domain\Rank\ValueObjects\SearchRankCount;

final class SearchRankList {
    private GameMode $gameMode;
    private SearchRankCount $rankCount;

    private function __construct(
        GameMode $gameMode,
        SearchRankCount $rankCount,
    ) {
        $this->gameMode  = $gameMode;
        $this->rankCount = $rankCount;
    }

    public function gameMode(): GameMode {
        return $this->gameMode;
    }

    public function rankCount(): SearchRankCount {
        return $this->rankCount;
    }

    public static function from(
        GameMode $gameMode,
        SearchRankCount $rankCount,
    ): SearchRankList {
        return new SearchRankList(
            $gameMode,
            $rankCount,
        );
    }
}
