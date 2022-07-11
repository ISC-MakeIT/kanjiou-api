<?php

namespace Tests\Feature\TimeLimit;

class TimeLimitsTest extends TimeLimitTestCase
{
    public function test_順位の一覧取得を行う(): void
    {
        $response = $this->get('/api/time_limits');
        $response->assertOk();
        $response->assertJson($this->findTimeLimitService->timeLimits());
    }
}
