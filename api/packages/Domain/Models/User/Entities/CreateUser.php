<?php

namespace Packages\Domain\Models\User\Entities;

use Packages\Domain\Models\User\ValueObjects\Email;
use Packages\Domain\Models\User\ValueObjects\Password;

final class CreateUser
{
    private Email $email;
    private Password $password;

    public function __construct(
        Email $email,
        Password $password,
    )
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function email(): Email
    {
        return $this->email;
    }

    public function password(): Password
    {
        return $this->password;
    }
}
