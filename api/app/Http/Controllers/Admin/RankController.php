<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use App\Http\Requests\Rank\RankListRequest;
use Packages\Service\Rank\Query\RankListService;

final class RankController extends Controller {
    private RankListService $rankListService;

    public function __construct(
        RankListService $rankListService,
    ) {
        $this->rankListService = $rankListService;
    }

    public function rankList(RankListRequest $request): View|Factory {
        return view(
            'admin.ranks.index',
            ['rankList' => $this->rankListService->rankList($request->toDomain())]
        );
    }
}
