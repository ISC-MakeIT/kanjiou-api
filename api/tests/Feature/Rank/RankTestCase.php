<?php

namespace Tests\Feature\Rank;

use Packages\Infrastructure\Repositories\Record\RecordListRepository;
use Packages\Service\Rank\Query\IsRankedInService;
use Packages\Service\Rank\Query\RankListService;
use Tests\DBRefreshTestCase;

class RankTestCase extends DBRefreshTestCase {
    protected RankListService $rankListService;
    protected IsRankedInService $isRankedInService;

    protected function setUp(): void {
        parent::setUp();

        $this->rankListService = new RankListService(
            new RecordListRepository()
        );

        $this->isRankedInService = new IsRankedInService(
            new RecordListRepository()
        );
    }
}
