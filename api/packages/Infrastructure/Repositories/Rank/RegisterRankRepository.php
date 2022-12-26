<?php

namespace Packages\Infrastructure\Repositories\Rank;

use Illuminate\Support\Facades\DB;
use Packages\Domain\Rank\Entities\InitRank;
use Packages\Exception\Rank\FailRegisterRankException;

final class RegisterRankRepository {
    public function registerRank(InitRank $initRank): void {
        DB::transaction(function () use ($initRank) {
            $gameMode = DB::selectOne('
                SELECT
                    game_mode_id
                FROM
                    game_modes
                WHERE
                    name = ?
            ', [$initRank->gameMode()->ofEn()]);

            $isSuccess = DB::insert('
                INSERT INTO ranks (
                    game_mode_id,
                    name,
                    seconds_left
                ) VALUES (?, ?, ?)
            ', [
                $gameMode->game_mode_id,
                $initRank->name()->value(),
                $initRank->secondsLeft()->value(),
            ]);

            if (!$isSuccess) {
                throw new FailRegisterRankException();
            }
        }, 3);
    }
}
