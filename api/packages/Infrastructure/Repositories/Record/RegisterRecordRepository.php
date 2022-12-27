<?php

namespace Packages\Infrastructure\Repositories\Record;

use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\DB;
use Packages\Domain\Record\Entities\InitRecord;
use Packages\Exception\Record\FailRegisterRecordException;

final class RegisterRecordRepository {
    public function registerRecord(InitRecord $initRecord): void {
        DB::transaction(function () use ($initRecord) {
            $gameMode = DB::selectOne('
                SELECT
                    game_mode_id
                FROM
                    game_modes
                WHERE
                    name = ?
            ', [$initRecord->gameMode()->ofJa()]);

            $isSuccess = DB::insert('
                INSERT INTO records (
                    game_mode_id,
                    name,
                    seconds_left,
                    created_at
                ) VALUES (?, ?, ?, ?)
            ', [
                $gameMode->game_mode_id,
                $initRecord->name()->value(),
                $initRecord->secondsLeft()->value(),
                CarbonImmutable::now()
            ]);

            if (!$isSuccess) {
                throw new FailRegisterRecordException();
            }
        }, 3);
    }
}
