<?php

namespace Packages\Service\Rank\Query;

use Packages\Domain\Rank\Entities\JudgedRankedIn;
use Packages\Domain\Rank\Entities\JudgeRankedIn;
use Packages\Domain\Rank\ValueObjects\RankOrder;
use Packages\Infrastructure\Repositories\Record\RecordListRepository;

final class IsRankedInService {
    private RecordListRepository $recordListRepository;

    public function __construct(RecordListRepository $recordListRepository) {
        $this->recordListRepository = $recordListRepository;
    }

    public function isRankedIn(JudgeRankedIn $judgeRankedIn): JudgedRankedIn {
        $recordList = $this->recordListRepository->recordList();

        $rankIfExists = $recordList->filterByGameMode($judgeRankedIn->gameMode())
            ->add($judgeRankedIn->toRecord())
            ->toRankList()
            ->copyOfRange(0, $judgeRankedIn->rankCount()->value())
            ->findByNamePointer();

        if ($rankIfExists) {
            return JudgedRankedIn::from($rankIfExists->rankOrder());
        }

        return JudgedRankedIn::from(RankOrder::from(0));
    }
}
