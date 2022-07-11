<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Packages\Domain\Models\User\Entities\AdminUser;
use Packages\Domain\Models\User\Entities\CreateAdminUser;
use Packages\Domain\Models\User\Entities\CreateUser;
use Packages\Domain\Models\User\Entities\CreateUserEntity;
use Packages\Domain\Models\User\ValueObjects\Email;
use Packages\Domain\Models\User\ValueObjects\Password;
use Packages\Infrastructure\Repositories\User\UserRepository;

class CreateAdminUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new admin user';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $userRepository = new UserRepository();
        $userRepository->createUser(
            new CreateUserEntity(
                new CreateUser(
                    Email::of($this->argument('email')),
                    Password::of($this->argument('password')),
                ),
                new CreateAdminUser(),
            )
        );
        return 0;
    }
}
