<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Packages\Domain\Models\TimeLimit\TimeLimitInterface;
use Packages\Domain\Models\User\UserInterface;
use Packages\Infrastructure\Repositories\TimeLimit\TimeLimitRepository;
use Packages\Infrastructure\Repositories\User\UserRepository;

class RegisterRepositoryProvider extends ServiceProvider
{
    public function register()
    {
        $this->registerTimeLimitRepository();
        $this->registerUserRepository();
    }

    public function boot()
    {
    }

    private function registerTimeLimitRepository(): void
    {
        $this->app->bind(
            TimeLimitInterface::class,
            TimeLimitRepository::class
        );
    }

    private function registerUserRepository(): void
    {
        $this->app->bind(
            UserInterface::class,
            UserRepository::class
        );
    }
}
