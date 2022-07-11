<?php

namespace Packages\Service\TimeLimit;

use Packages\Assembler\TimeLimitAssember;
use Packages\Domain\Models\TimeLimit\ValueObjects\Seconds;
use Packages\Infrastructure\Repositories\TimeLimit\TimeLimitRepository;

final class FindTimeLimitService
{
    private TimeLimitAssember $timeLimitAssember;
    private TimeLimitRepository $timeLimitRepository;

    public function __construct(
        TimeLimitAssember $timeLimitAssember,
        TimeLimitRepository $timeLimitRepository,
    )
    {
        $this->timeLimitAssember = $timeLimitAssember;
        $this->timeLimitRepository = $timeLimitRepository;
    }

    public function timeLimits(): array
    {
        $timeLimitEntities = $this->timeLimitRepository->nonDeleteTimeLimits();
        return $this->timeLimitAssember->timeLimitEntitiesOfJson($timeLimitEntities);
    }

    public function timeLimit(Seconds $seconds): array
    {
        $timeLimitEntities = $this->timeLimitRepository->nonDeleteTimeLimits();
        return $this->timeLimitAssember->timeLimitSecondOfJson($timeLimitEntities, $seconds);
    }
}
