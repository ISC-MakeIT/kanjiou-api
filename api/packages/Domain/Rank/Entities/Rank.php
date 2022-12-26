<?php

namespace Packages\Domain\Rank\Entities;

use Packages\Domain\GameMode\ValueObjects\GameMode;
use Packages\Domain\Rank\ValueObjects\RankOrder;
use Packages\Domain\Record\ValueObjects\RecordMetaData;

final class Rank {
    private GameMode $gameMode;
    private RecordMetaData $recordMetaData;
    private RankOrder $rankOrder;

    private function __construct(
        GameMode $gameMode,
        RecordMetaData $recordMetaData,
        RankOrder $rankOrder,
    ) {
        $this->gameMode       = $gameMode;
        $this->recordMetaData = $recordMetaData;
        $this->rankOrder      = $rankOrder;
    }

    public function gameMode(): GameMode {
        return $this->gameMode;
    }

    public function recordMetaData(): RecordMetaData {
        return $this->recordMetaData;
    }

    public function rankOrder(): RankOrder {
        return $this->rankOrder;
    }

    public static function from(
        GameMode $gameMode,
        RecordMetaData $recordMetaData,
        RankOrder $rankOrder,
    ): Rank {
        return new Rank(
            $gameMode,
            $recordMetaData,
            $rankOrder,
        );
    }
}
