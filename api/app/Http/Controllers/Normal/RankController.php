<?php

namespace App\Http\Controllers\Normal;

use App\Http\Controllers\Controller;
use App\Http\Requests\Rank\IsRankedInRequest;
use App\Http\Requests\Rank\RankListRequest;
use Packages\Service\Rank\Query\IsRankedInService;
use Packages\Service\Rank\Query\RankListService;

final class RankController extends Controller {
    private RankListService $rankListService;
    private IsRankedInService $isRankedInService;

    public function __construct(
        RankListService $rankListService,
        IsRankedInService $isRankedInService
    ) {
        $this->rankListService   = $rankListService;
        $this->isRankedInService = $isRankedInService;
    }

    public function rankList(RankListRequest $request): array {
        return $this->rankListService->rankList($request->toDomain())->toJson();
    }

    public function isRankedIn(IsRankedInRequest $request): array {
        return $this->isRankedInService->isRankedIn($request->toDomain())->toJson();
    }
}
