<?php

namespace Packages\Domain\Record\Entities;

use Packages\Domain\Elements;
use Packages\Domain\GameMode\ValueObjects\GameMode;
use Packages\Domain\Rank\Entities\RankList;
use Packages\Domain\Rank\ValueObjects\RankOrder;

final class RecordList extends Elements {
    protected string $name = 'ゲーム結果のリスト';

    /** @return Record[] */
    public function value(): array {
        return parent::value();
    }

    public function sortBySecondsLeft(): RecordList {
        $filtered = [];
        $absolute = [];

        foreach ($this->value() as $rank) {
            $filtered[] = $rank;
            $absolute[] = $rank->secondsLeft()->value();
        }

        array_multisort($absolute, SORT_DESC, $filtered);

        return RecordList::from($filtered);
    }

    public function filterByGameMode(GameMode $gameMode): RecordList {
        $filtered = [];

        foreach ($this->value() as $record) {
            if ($record->gameMode() !== $gameMode) {
                continue;
            }

            $filtered[] = $record;
        }

        return RecordList::from($filtered);
    }

    public function toRankList(): RankList {
        if ($this->isEmpty()) {
            return RankList::from([]);
        }

        $recordList = $this->sortBySecondsLeft();

        $currentRankOrder   = 1;
        /** @var Record */
        $evaluatedRecord = $recordList->first();
        $filtered        = [];

        foreach ($recordList->value() as $index => $record) {
            if ($evaluatedRecord->secondsLeft() == $record->secondsLeft()) {
                $evaluatedRecord = $record;
                $filtered[]      = $record->toRankWith(RankOrder::from($currentRankOrder));
                continue;
            }

            $evaluatedRecord  = $record;
            $currentRankOrder = $index + 1;
            $filtered[]       = $record->toRankWith(RankOrder::from($currentRankOrder));
        }

        return RankList::from($filtered);
    }
}
