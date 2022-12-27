<?php

namespace Packages\Infrastructure\Repositories\User;

use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\DB;
use Packages\Domain\User\Entities\InitUser;
use Packages\Exception\User\FailRegisterUserException;
use Packages\Exception\User\FailUserToLoginException;

final class RegisterUserRepository {
    public function registerUser(InitUser $initUser): void {
        DB::transaction(function () use ($initUser) {
            $isSuccess = DB::insert('
                INSERT INTO users (
                    user_name,
                    password,
                    created_at
                ) VALUES (?, ?, ?)
            ', [
                $initUser->userName()->value(),
                $initUser->password()->toHashValue(),
                CarbonImmutable::now()
            ]);

            if (!$isSuccess) {
                throw new FailRegisterUserException();
            }

            if (auth()->attempt($initUser->toJson())) {
                return;
            }

            throw new FailUserToLoginException();
        });
    }
}
