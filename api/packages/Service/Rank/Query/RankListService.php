<?php

namespace Packages\Service\Rank\Query;

use Packages\Domain\Rank\Entities\RankList;
use Packages\Domain\Rank\Entities\SearchRankList;
use Packages\Infrastructure\Repositories\Record\RecordListRepository;

final class RankListService {
    private RecordListRepository $recordListRepository;

    public function __construct(RecordListRepository $recordListRepository) {
        $this->recordListRepository = $recordListRepository;
    }

    public function rankList(SearchRankList $searchRankList): RankList {
        $recordList = $this->recordListRepository->recordList();

        return $recordList->filterByGameMode($searchRankList->gameMode())
                          ->toRankList()
                          ->copyOfRange(0, $searchRankList->rankCount()->value());
    }
}
