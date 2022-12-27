<?php

namespace Packages\Domain\Rank\Entities;

use Packages\Domain\GameMode\ValueObjects\GameMode;
use Packages\Domain\Rank\ValueObjects\SearchRankCount;
use Packages\Domain\Record\Entities\Record;
use Packages\Domain\Record\ValueObjects\Name;
use Packages\Domain\Record\ValueObjects\RecordId;
use Packages\Domain\Record\ValueObjects\RecordMetaData;
use Packages\Domain\Record\ValueObjects\SecondsLeft;

final class JudgeRankedIn {
    private GameMode $gameMode;
    private SecondsLeft $secondsLeft;
    private SearchRankCount $rankCount;

    private function __construct(
        GameMode $gameMode,
        SecondsLeft $secondsLeft,
        SearchRankCount $rankCount
    ) {
        $this->gameMode    = $gameMode;
        $this->secondsLeft = $secondsLeft;
        $this->rankCount   = $rankCount;
    }

    public function gameMode(): GameMode {
        return $this->gameMode;
    }

    public function rankCount(): SearchRankCount {
        return $this->rankCount;
    }

    public function secondsLeft(): SecondsLeft {
        return $this->secondsLeft;
    }

    public function toRecord(): Record {
        return Record::from(
            RecordId::unsafetyFrom(0),
            $this->gameMode(),
            RecordMetaData::from(
                Name::unsafetyFrom(Name::pointer()),
                $this->secondsLeft()
            )
        );
    }

    public static function from(
        GameMode $gameMode,
        SecondsLeft $secondsLeft,
        SearchRankCount $rankCount
    ): JudgeRankedIn {
        return new JudgeRankedIn(
            $gameMode,
            $secondsLeft,
            $rankCount,
        );
    }
}
