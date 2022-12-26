<?php

namespace Tests\Feature\Rank;

use Packages\Infrastructure\Repositories\Record\RecordListRepository;
use Packages\Service\Rank\Query\RankListService;
use Tests\DBRefreshTestCase;

class RankTestCase extends DBRefreshTestCase {
    protected RankListService $rankListService;

    protected function setUp(): void {
        parent::setUp();

        $this->rankListService = new RankListService(
            new RecordListRepository()
        );
    }
}
