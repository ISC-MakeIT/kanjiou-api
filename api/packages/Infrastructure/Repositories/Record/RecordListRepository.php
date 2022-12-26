<?php

namespace Packages\Infrastructure\Repositories\Record;

use Illuminate\Support\Facades\DB;
use Packages\Domain\GameMode\ValueObjects\GameMode;
use Packages\Domain\Rank\ValueObjects\SearchRankCount;
use Packages\Domain\Record\Entities\Record;
use Packages\Domain\Record\Entities\RecordList;
use Packages\Domain\Record\ValueObjects\Name;
use Packages\Domain\Record\ValueObjects\RecordMetaData;
use Packages\Domain\Record\ValueObjects\SecondsLeft;

final class RecordListRepository {
    public function recordList(): RecordList {
        $result     = [];
        $recordList = DB::select('
            SELECT
                game_modes.name      AS game_mode,
                records.name         AS name,
                records.seconds_left AS seconds_left
            FROM
                records
            INNER JOIN game_modes
                USING(game_mode_id)
        ');

        foreach ($recordList as $record) {
            $result[] = Record::from(
                GameMode::from($record->game_mode),
                RecordMetaData::from(
                    Name::from($record->name),
                    SecondsLeft::from($record->seconds_left)
                ),
            );
        }

        return RecordList::from($result);
    }
}