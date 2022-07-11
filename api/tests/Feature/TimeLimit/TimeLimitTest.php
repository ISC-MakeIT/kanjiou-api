<?php

namespace Tests\Feature\TimeLimit;

use Packages\Domain\Models\TimeLimit\ValueObjects\Seconds;

class TimeLimitTest extends TimeLimitTestCase
{
    public function test_順位の取得を行う(): void
    {
        $response = $this->get('/api/time_limits/time_limit?seconds=60');
        $response->assertOk();
        $response->assertJson($this->findTimeLimitService->timeLimit(Seconds::of(60)));
    }
}
