<?php

namespace Tests\Feature;

use App\Models\TimeLimit;
use App\Models\TimeLimitDelete;
use Illuminate\Support\Facades\Artisan;
use App\Models\TimeLimitRank;
use Tests\TestCase;

class TimeLimitTest extends TestCase
{
    public function setUp():void
    {
        parent::setUp();
        Artisan::call('db:seed');
    }

    public function test_順位の取得を行える(): void
    {
        $response = $this->get('/api/time_limits/time_limit?seconds=60');
        $response->assertOk();
        $response->assertJson(['rank' => 1]);
    }

    public function test_取得を行える(): void
    {
        $response = $this->get('/api/time_limits');
        $response->assertOk();
        $response->assertJson(TimeLimitRank::get()->toArray());
    }

    public function test_登録を行える(): void
    {
        $time_limit_data = [
            'seconds' => 60,
            'name' => 'test',
        ];
        $response = $this->post('/api/time_limits', $time_limit_data);
        $response->assertOk();
        $this->assertEquals($time_limit_data, TimeLimitRank::first(['seconds', 'name'])->toArray());
    }

    public function test_削除を行える(): void
    {
        $time_limit = TimeLimit::first()
                ->makeVisible(['time_limit_id'])
                ->toArray();
        $response = $this->delete('/api/time_limits', [
            'time_limit_id' => $time_limit['time_limit_id']
        ]);
        $response->assertOk();
        $is_time_limit_delete = TimeLimitDelete::where('name', $time_limit['name'])
                        ->where('seconds', $time_limit['seconds'])
                        ->exists();
        $this->assertTrue($is_time_limit_delete);
    }
}
