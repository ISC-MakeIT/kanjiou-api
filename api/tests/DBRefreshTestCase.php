<?php

namespace Tests;

use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class DBRefreshTestCase extends TestCase
{
    protected function setUp():void
    {
        parent::setUp();
        Artisan::call('migrate:fresh --path=database/migrations/**');
        Artisan::call('db:seed');
    }
}
