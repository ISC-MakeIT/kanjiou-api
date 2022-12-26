<?php

namespace Tests\Feature\Rank;

use App\Http\Requests\Rank\RankListRequest;

class RankListTest extends RankTestCase {
    public function test_ランクの取得を行えること(): void {
        $request = new RankListRequest(['rankCount' => 100]);

        $response = $this->get('/api/ranks' . $request->toParams());
        $response->assertOk();
        $response->assertJson($this->rankListService->rankList($request->toDomain())->toJson());
    }
}
