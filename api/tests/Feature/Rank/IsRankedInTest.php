<?php

namespace Tests\Feature\Rank;

use App\Http\Requests\Rank\IsRankedInRequest;
use Packages\Domain\GameMode\ValueObjects\GameMode;

class IsRankedInTest extends RankTestCase {
    public function test_ランクに入っているか確認を行えること(): void {
        $request = new IsRankedInRequest([
            'rankCount'   => 100,
            'secondsLeft' => 60,
            'gameMode'    => GameMode::ONE_DOG_AMOUNG_SHEEP->ofJa()
        ]);

        $response = $this->get("/api/ranks/{$request->toDomain()->secondsLeft()->value()}" . $request->toParams());
        $response->assertOk();
        $response->assertJson($this->isRankedInService->isRankedIn($request->toDomain())->toJson());
    }
}
