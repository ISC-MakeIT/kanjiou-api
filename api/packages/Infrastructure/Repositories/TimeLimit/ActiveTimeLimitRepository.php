<?php

namespace Packages\Infrastructure\Repositories\TimeLimit;

use Packages\Domain\Models\TimeLimit\Entities\TimeLimitList;
use Packages\Domain\Models\TimeLimit\Entities\timeLimit as DomainTimeLimit;
use Packages\Domain\Models\TimeLimit\ValueObjects\TimeLimitId;
use Packages\Infrastructure\EloquentModels\TimeLimit\TimeLimit;

final class ActiveTimeLimitRepository
{
    /** @return TimeLimitList */
	public function activeTimeLimits(): TimeLimitList {
        $timeLimitList = new TimeLimitList([]);
		TimeLimit::doesntHave('delete')
            ->orderBy('seconds', 'desc')
            ->take(101)
            ->get()
            ->map(function(TimeLimit $timeLimit) use (&$timeLimitList) {
                $timeLimitList = $timeLimitList->addTimeLimit($timeLimit->ofDomain());
            });
        return $timeLimitList;
    }

	public function activeTimeLimit(TimeLimitId $timeLimitId): DomainTimeLimit
    {
		return TimeLimit::doesntHave('delete')
            ->findOrFail($timeLimitId->value())
            ->ofDomain();
    }
}
