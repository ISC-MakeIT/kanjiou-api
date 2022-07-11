<?php

namespace Tests\Feature\TimeLimit;

use Packages\Infrastructure\EloquentModels\TimeLimit\TimeLimit;

class CreateTimeLimitTest extends TimeLimitTestCase
{
    public function test_順位の登録を行う(): void
    {
        $timeLimit = [
            'seconds' => 60,
            'name' => 'test',
        ];
        $response = $this->post('/api/time_limits', $timeLimit);
        $response->assertOk();
        $eloquentTimeLimit = TimeLimit::orderBy('time_limit_id', 'desc')
            ->first(['seconds', 'name'])
            ->toArray();
        $this->assertEquals(
            $timeLimit,
            $eloquentTimeLimit
        );
    }
}
