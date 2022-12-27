<?php

namespace Packages\Infrastructure\Repositories\Record;

use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\DB;
use Packages\Domain\GameMode\ValueObjects\GameMode;
use Packages\Domain\Record\Entities\Record;
use Packages\Domain\Record\Entities\RecordList;
use Packages\Domain\Record\ValueObjects\Name;
use Packages\Domain\Record\ValueObjects\RecordedAt;
use Packages\Domain\Record\ValueObjects\RecordId;
use Packages\Domain\Record\ValueObjects\RecordMetaData;
use Packages\Domain\Record\ValueObjects\SecondsLeft;

final class RecordListRepository {
    public function recordList(): RecordList {
        $result     = [];
        $recordList = DB::select('
            SELECT
                records.record_id    AS record_id,
                game_modes.name      AS game_mode,
                records.name         AS name,
                records.created_at   AS created_at,
                records.seconds_left AS seconds_left
            FROM
                records
            INNER JOIN game_modes
                USING(game_mode_id)
        ');

        foreach ($recordList as $record) {
            $result[] = Record::from(
                RecordId::from($record->record_id),
                GameMode::from($record->game_mode),
                RecordMetaData::from(
                    Name::from($record->name),
                    SecondsLeft::from($record->seconds_left)
                ),
                RecordedAt::from(new CarbonImmutable($record->created_at))
            );
        }

        return RecordList::from($result);
    }
}
