<?php

namespace Tests;

use Illuminate\Foundation\Testing\DatabaseTransactions;

class DBRefreshTestCase extends TestCase {
    use DatabaseTransactions;

    protected function setUp(): void {
        parent::setUp();
    }
}
