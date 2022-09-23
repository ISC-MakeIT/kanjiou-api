<?php

namespace Packages\Service\TimeLimit;

use Packages\Domain\Models\TimeLimit\Entities\InitTimeLimit;
use Packages\Domain\Models\TimeLimit\ValueObjects\TimeLimitId;
use Packages\Infrastructure\Repositories\TimeLimit\DeleteTimeLimitRepository;
use Packages\Infrastructure\Repositories\TimeLimit\InitTimeLimitRepository;

final class QueryTimeLimitService
{
    private InitTimeLimitRepository $initTimeLimitRepository;
    private DeleteTimeLimitRepository $deleteTimeLimitRepository;

    public function __construct(
        InitTimeLimitRepository $initTimeLimitRepository,
        DeleteTimeLimitRepository $deleteTimeLimitRepository
    )
    {
        $this->initTimeLimitRepository = $initTimeLimitRepository;
        $this->deleteTimeLimitRepository = $deleteTimeLimitRepository;
    }

    public function createTimeLimit(InitTimeLimit $initTimeLimit): void
    {
        $this->initTimeLimitRepository->createTimeLimit($initTimeLimit);
    }

    public function deleteTimeLimit(TimeLimitId $timeLimitId): void
    {
        $this->deleteTimeLimitRepository->deleteTimeLimit($timeLimitId);
    }
}
