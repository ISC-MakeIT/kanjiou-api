<?php

namespace Packages\Domain\Rank\Entities;

use Packages\Domain\GameMode\ValueObjects\GameMode;
use Packages\Domain\Rank\ValueObjects\RankOrder;
use Packages\Domain\Record\ValueObjects\Name;
use Packages\Domain\Record\ValueObjects\RecordedAt;
use Packages\Domain\Record\ValueObjects\RecordId;
use Packages\Domain\Record\ValueObjects\RecordMetaData;
use Packages\Domain\Record\ValueObjects\SecondsLeft;

final class Rank {
    private RecordId $recordId;
    private GameMode $gameMode;
    private RecordMetaData $recordMetaData;
    private RankOrder $rankOrder;
    private RecordedAt $recordedAt;

    private function __construct(
        RecordId $recordId,
        GameMode $gameMode,
        RecordMetaData $recordMetaData,
        RecordedAt $recordedAt,
        RankOrder $rankOrder,
    ) {
        $this->recordId       = $recordId;
        $this->gameMode       = $gameMode;
        $this->recordMetaData = $recordMetaData;
        $this->recordedAt     = $recordedAt;
        $this->rankOrder      = $rankOrder;
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

    public function recordMetaData(): RecordMetaData {
        return $this->recordMetaData;
    }

    public function rankOrder(): RankOrder {
        return $this->rankOrder;
    }

    public function recordedAt(): RecordedAt {
        return $this->recordedAt;
    }

    public function toJson(): array {
        return [
            'gameMode'    => $this->gameMode()->ofJa(),
            'name'        => $this->name()->value(),
            'secondsLeft' => $this->secondsLeft()->value(),
            'recordedAt'  => $this->recordedAt()->formatDateTime(),
            'rankOrder'   => $this->rankOrder()->value(),
        ];
    }

    public static function from(
        RecordId $recordId,
        GameMode $gameMode,
        RecordMetaData $recordMetaData,
        RecordedAt $recordedAt,
        RankOrder $rankOrder,
    ): Rank {
        return new Rank(
            $recordId,
            $gameMode,
            $recordMetaData,
            $recordedAt,
            $rankOrder,
        );
    }
}
