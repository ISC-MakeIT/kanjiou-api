<?php

namespace Packages\Service\TimeLimit;

use Packages\Assembler\TimeLimitAssember;
use Packages\Infrastructure\Repositories\TimeLimit\TimeLimitRepository;
use Packages\Domain\Models\TimeLimit\Entities\CreateTimeLimit;
use Packages\Domain\Models\TimeLimit\ValueObjects\TimeLimitId;

final class RegisterTimeLimitService
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

    public function createTimeLimit(CreateTimeLimit $createTimeLimit): void
    {
        $this->timeLimitRepository->createTimeLimit($createTimeLimit);
    }

    public function deleteTimeLimit(TimeLimitId $timeLimitId): void
    {
        $this->timeLimitRepository->deleteTimeLimit($timeLimitId);
    }
}
