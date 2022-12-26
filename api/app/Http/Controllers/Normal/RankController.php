<?php

namespace App\Http\Controllers\Normal;

use App\Http\Controllers\Controller;
use App\Http\Requests\Rank\RankListRequest;
use Packages\Service\Rank\Query\RankListService;

final class RankController extends Controller {
    private RankListService $rankListService;

    public function __construct(RankListService $rankListService) {
        $this->rankListService = $rankListService;
    }

    public function rankList(RankListRequest $request): array {
        return $this->rankListService->rankList($request->toDomain())->toJson();
    }
}
