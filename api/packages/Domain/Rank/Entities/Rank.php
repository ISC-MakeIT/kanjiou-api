<?php

namespace Packages\Domain\Rank\Entities;

use Packages\Domain\GameMode\ValueObjects\GameMode;
use Packages\Domain\Rank\ValueObjects\RankOrder;
use Packages\Domain\Record\ValueObjects\Name;
use Packages\Domain\Record\ValueObjects\RecordId;
use Packages\Domain\Record\ValueObjects\RecordMetaData;
use Packages\Domain\Record\ValueObjects\SecondsLeft;

final class Rank {
    private RecordId $recordId;
    private GameMode $gameMode;
    private RecordMetaData $recordMetaData;
    private RankOrder $rankOrder;

    private function __construct(
        RecordId $recordId,
        GameMode $gameMode,
        RecordMetaData $recordMetaData,
        RankOrder $rankOrder,
    ) {
        $this->recordId       = $recordId;
        $this->gameMode       = $gameMode;
        $this->recordMetaData = $recordMetaData;
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

    public function toJson(): array {
        return [
            'gameMode'    => $this->gameMode()->ofJa(),
            'name'        => $this->name()->value(),
            'secondsLeft' => $this->secondsLeft()->value(),
            'rankOrder'   => $this->rankOrder()->value(),
        ];
    }

    public static function from(
        RecordId $recordId,
        GameMode $gameMode,
        RecordMetaData $recordMetaData,
        RankOrder $rankOrder,
    ): Rank {
        return new Rank(
            $recordId,
            $gameMode,
            $recordMetaData,
            $rankOrder,
        );
    }
}
