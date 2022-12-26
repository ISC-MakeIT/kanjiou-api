<?php

namespace App\Http\Controllers\Normal;

use App\Http\Controllers\Controller;
use App\Http\Requests\Rank\RegisterRankRequest;
use Packages\Service\Rank\Command\RegisterRankService;

final class RankController extends Controller {
    private RegisterRankService $registerRankService;

    public function __construct(RegisterRankService $registerRankService) {
        $this->registerRankService = $registerRankService;
    }

    public function registerRank(RegisterRankRequest $request): void {
        $this->registerRankService->registerRank($request->ofDomain());
    }
}
