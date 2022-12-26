<?php

namespace Tests\Feature\Rank;

use App\Http\Requests\Rank\RegisterRankRequest;
use Packages\Domain\GameMode\ValueObjects\GameMode;
use Packages\Infrastructure\EloquentModels\Rank\Rank;
use Tests\TestCase;

class RegisterRankTest extends TestCase {
    public function test_ランクの登録を行えること(): void {
        Rank::query()->delete();

        $request = new RegisterRankRequest([
            'secondsLeft' => 1,
            'name'        => 'test',
            'gameMode'    => GameMode::ONE_DOG_AMOUNG_SHEEP->ofJa(),
        ]);

        $response = $this->post('/api/ranks', $request->all());
        $response->assertOk();
        $this->assertCount(1, Rank::all()->toArray());
    }
}
