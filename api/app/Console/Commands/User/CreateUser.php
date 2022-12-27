<?php

namespace App\Console\Commands\User;

use Illuminate\Console\Command;
use Packages\Domain\Error\Entities\ErrorList;
use Packages\Domain\User\Entities\InitUser;
use Packages\Domain\User\ValueObjects\Password;
use Packages\Domain\User\ValueObjects\UserName;
use Packages\Infrastructure\Repositories\User\RegisterUserRepository;

class CreateUser extends Command {
    protected $signature   = 'user:create {userName} {password}';
    protected $description = 'create admin user';

    public function handle() {
        $registerUserRepository = new RegisterUserRepository();

        $errorList = ErrorList::from([]);

        $initUser = InitUser::from(
            UserName::unsafetyFrom($this->argument('userName')),
            Password::unsafetyFrom($this->argument('password')),
        );

        $errorList = $errorList->addIfError($initUser->userName());
        $errorList = $errorList->addIfError($initUser->password());

        if ($errorList->hasValidationError()) {
            foreach ($errorList->validatedMessages() as $messages) {
                printf("[ERROR] %s\n", $messages[0]);
            }
            return 1;
        }

        $registerUserRepository->registerUser($initUser);

        return 0;
    }
}
