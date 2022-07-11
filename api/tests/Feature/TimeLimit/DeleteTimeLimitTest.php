<?php

namespace Tests\Feature\TimeLimit;

use Packages\Infrastructure\EloquentModels\TimeLimit\TimeLimit;
use Packages\Infrastructure\EloquentModels\TimeLimit\TimeLimitDelete;

class DeleteTimeLimitTest extends TimeLimitTestCase
{
    public function test_順位の削除を行う(): void
    {
        $time_limit = TimeLimit::first()
                ->makeVisible(['time_limit_id'])
                ->toArray();
        $response = $this->delete('/api/time_limits', [
            'time_limit_id' => $time_limit['time_limit_id']
        ]);
        $response->assertOk();
        $this->assertNotNull(TimeLimitDelete::find($time_limit['time_limit_id']));
    }
}
