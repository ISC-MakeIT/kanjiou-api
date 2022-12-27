<?php

namespace Packages\Domain\Record\Entities;

use Packages\Domain\GameMode\ValueObjects\GameMode;
use Packages\Domain\Rank\Entities\Rank;
use Packages\Domain\Rank\ValueObjects\RankOrder;
use Packages\Domain\Record\ValueObjects\Name;
use Packages\Domain\Record\ValueObjects\RecordedAt;
use Packages\Domain\Record\ValueObjects\RecordId;
use Packages\Domain\Record\ValueObjects\RecordMetaData;
use Packages\Domain\Record\ValueObjects\SecondsLeft;

final class Record {
    private RecordId $recordId;
    private GameMode $gameMode;
    private RecordMetaData $recordMetaData;
    private RecordedAt $recordedAt;

    private function __construct(
        RecordId $recordId,
        GameMode $gameMode,
        RecordMetaData $recordMetaData,
        RecordedAt $recordedAt,
    ) {
        $this->recordId       = $recordId;
        $this->gameMode       = $gameMode;
        $this->recordMetaData = $recordMetaData;
        $this->recordedAt     = $recordedAt;
    }

    public function recordId(): RecordId {
        return $this->recordId;
    }

    public function gameMode(): GameMode {
        return $this->gameMode;
    }

    public function name(): Name {
        return $this->recordMetaData->name();
    }

    public function secondsLeft(): SecondsLeft {
        return $this->recordMetaData->secondsLeft();
    }

    public function recordedAt(): RecordedAt {
        return $this->recordedAt;
    }

    public function recordMetaData(): RecordMetaData {
        return $this->recordMetaData;
    }

    public function toRankWith(RankOrder $rankOrder): Rank {
        return Rank::from(
            $this->recordId(),
            $this->gameMode(),
            $this->recordMetaData(),
            $this->recordedAt(),
            $rankOrder,
        );
    }

    public static function from(
        RecordId $recordId,
        GameMode $gameMode,
        RecordMetaData $recordMetaData,
        RecordedAt $recordedAt,
    ): Record {
        return new Record(
            $recordId,
            $gameMode,
            $recordMetaData,
            $recordedAt,
        );
    }
}
