<?php

namespace Packages\Infrastructure\Repositories\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Packages\Domain\Models\User\Entities\CreateUserEntity;
use Packages\Domain\Models\User\UserInterface;
use Packages\Infrastructure\EloquentModels\User\AdminUser;
use Packages\Infrastructure\EloquentModels\User\User;

final class UserRepository implements UserInterface
{
    public function createUser(CreateUserEntity $createUserEntity): void
    {
        DB::transaction(function() use ($createUserEntity) {
            $user = User::create([
                'email' => $createUserEntity->user()->email()->value(),
                'password' => Hash::make($createUserEntity->user()->password()->value()),
            ]);
            if ($createUserEntity->isAdmin()) {
                AdminUser::create(['user_id' => $user->user_id]);
            }
        });
    }
}
