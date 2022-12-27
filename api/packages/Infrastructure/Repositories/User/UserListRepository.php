<?php

namespace Packages\Infrastructure\Repositories\User;

use Illuminate\Support\Facades\DB;
use Packages\Domain\User\Entities\User;
use Packages\Domain\User\Entities\UserList;
use Packages\Domain\User\ValueObjects\UserName;

final class UserListRepository {
    public function userList(): UserList {
        $result = UserList::from([]);

        $userList = DB::select('
            SELECT
                user_name
            FROM users
        ');

        foreach ($userList as $user) {
            $result = $result->add(
                User::from(
                    UserName::from($user->user_name)
                )
            );
        }

        return $result;
    }
}
