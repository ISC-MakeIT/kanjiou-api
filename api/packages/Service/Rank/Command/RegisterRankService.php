<?php

namespace Packages\Service\Rank\Command;

use Packages\Domain\Rank\Entities\InitRank;
use Packages\Infrastructure\Repositories\Rank\RegisterRankRepository;

final class RegisterRankService {
    private RegisterRankRepository $registerRankRepository;

    public function __construct(RegisterRankRepository $registerRankRepository) {
        $this->registerRankRepository = $registerRankRepository;
    }

    public function registerRank(InitRank $initRank): void {
        $this->registerRankRepository->registerRank($initRank);
    }
}
