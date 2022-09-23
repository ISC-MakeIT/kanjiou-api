<?php

namespace Tests\Feature\TimeLimit;

use Packages\Domain\Models\TimeLimit\ValueObjects\Seconds;

class TimeLimitTest extends TimeLimitTestCase
{
    public function test_順位の取得を行う(): void
    {
        $response = $this->get('/api/time_limits/time_limit?seconds=60');
        $response->assertOk();
        $response->assertJson($this->commandTimeLimitService->timeLimit(Seconds::of(60)));
    }


    public function test_順位の取得時にランキング外だった場合は400が返ること(): void
    {
        $response = $this->get('/api/time_limits/time_limit?seconds=1');
        $response->assertStatus(400);
    }
}
