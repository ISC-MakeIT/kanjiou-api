<?php

namespace Packages\Service\Rank\Query;

use Packages\Domain\Rank\Entities\RankList;
use Packages\Domain\Rank\ValueObjects\SearchRankCount;
use Packages\Infrastructure\Repositories\Record\RecordListRepository;

final class RankListService {
    private RecordListRepository $recordListRepository;

    public function __construct(RecordListRepository $recordListRepository) {
        $this->recordListRepository = $recordListRepository;
    }

    public function rankList(SearchRankCount $searchRankCount): RankList {
        $recordList = $this->recordListRepository->recordList();

        return $recordList->toRankList()->copyOfRange(0, $searchRankCount->value());
    }
}
