<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Packages\Domain\Models\TimeLimit\TimeLimitInterface;
use Packages\Infrastructure\Repositories\TimeLimit\TimeLimitRepository;

class RegisterRepositoryProvider extends ServiceProvider
{
    public function register()
    {
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
}
