<?php

namespace Packages\Infrastructure\Repositories\User;

use Illuminate\Support\Facades\DB;
use Packages\Domain\Models\User\Entities\InitUser;
use Packages\Infrastructure\Repositories\Exceptions\User\FailCreateUserExcepiton;
use Packages\Infrastructure\Repositories\Exceptions\User\IllegalCreateUserExcepiton;

final class InitUserRepository {
    public function createUser(InitUser $initUser): void {
        DB::transaction(function() use ($initUser) {
            $user = DB::selectOne('
                SELECT
                    user_id
                FROM
                    users
                LIMIT 1
            ');

            if (!empty($user)) {
                throw new IllegalCreateUserExcepiton();
            }

            $isSuccess = DB::insert('
                INSERT INTO users (
                    username,
                    password
                )
                VALUES (?, ?)
            ', [
                $initUser->username()->value(),
                $initUser->password()->hashValue(),
            ]);

            if (!$isSuccess) {
                throw new FailCreateUserExcepiton();
            }

            $user = DB::selectOne('
                SELECT
                    user_id
                FROM
                    users
                LIMIT 1
            ');

            $isSuccess = DB::insert('
                INSERT INTO admin_users (
                    user_id
                )
                VALUES (?)
            ', [
                $user->user_id,
            ]);

            if (!$isSuccess) {
                throw new FailCreateUserExcepiton();
            }
        });
    }
}
