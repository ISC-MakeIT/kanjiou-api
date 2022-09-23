<?php

namespace Tests\Feature\TimeLimit;

use Packages\Infrastructure\EloquentModels\TimeLimit\TimeLimit;

class CreateTimeLimitTest extends TimeLimitTestCase
{
    public function test_順位の登録を行う(): void
    {
        $request = [
            'seconds' => 60,
            'name' => 'test',
        ];
        $response = $this->post('/api/time_limits', $request);
        $response->assertOk();
        $timeLimit = TimeLimit::orderBy('time_limit_id', 'desc')
            ->first(['seconds', 'name'])
            ->toArray();
        $this->assertEquals(
            $request,
            $timeLimit
        );
    }

    public function test_順位の登録を行う際に名前が9文字以上だった場合400が返ること(): void
    {
        $request = [
            'seconds' => 60,
            'name' => 'aaaaaaaaa',
        ];
        $response = $this->post('/api/time_limits', $request);
        $response->assertStatus(400);
    }
}
