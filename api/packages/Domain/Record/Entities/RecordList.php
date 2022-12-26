<?php

namespace Packages\Domain\Record\Entities;

use Packages\Domain\Elements;
use Packages\Domain\Rank\Entities\RankList;
use Packages\Domain\Rank\ValueObjects\RankOrder;

final class RecordList extends Elements {
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

    public function toRankList(): RankList {
        if ($this->isEmpty()) {
            return RankList::from([]);
        }

        $currentRankOrder   = 1;
        /** @var Record */
        $evaluatedRecord = $this->first();
        $filtered        = [$evaluatedRecord->toRankWith(RankOrder::from($currentRankOrder))];

        foreach ($this->value() as $index => $record) {
            if ($evaluatedRecord->secondsLeft() == $record->secondsLeft()) {
                $filtered[] = $record->toRankWith(RankOrder::from($currentRankOrder));
                continue;
            }

            $currentRankOrder = $index + 1;
            $filtered[]       = $record->toRankWith(RankOrder::from($currentRankOrder));
        }

        return RankList::from($filtered);
    }
}
