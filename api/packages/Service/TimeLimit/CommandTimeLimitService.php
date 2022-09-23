<?php

namespace Packages\Service\TimeLimit;

use Packages\Domain\Models\TimeLimit\ValueObjects\Seconds;
use Packages\Infrastructure\Repositories\TimeLimit\ActiveTimeLimitRepository;

final class CommandTimeLimitService {
    private ActiveTimeLimitRepository $activeTimeLimitRepository;

    public function __construct(
        ActiveTimeLimitRepository $activeTimeLimitRepository,
    ) {
        $this->activeTimeLimitRepository = $activeTimeLimitRepository;
    }

    public function timeLimits(): array {
        $timeLimits = $this->activeTimeLimitRepository->activeTimeLimits();
        return $timeLimits->ofRanksJson();
    }

    public function timeLimit(Seconds $seconds): array {
        $timeLimits = $this->activeTimeLimitRepository->activeTimeLimits();
        return $timeLimits->ofRankJsonFromSeconds($seconds);
    }
}
