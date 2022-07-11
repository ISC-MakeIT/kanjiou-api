<?php

namespace Packages\Domain\Models\TimeLimit;

use Packages\Domain\Models\TimeLimit\Entities\CreateTimeLimit;
use Packages\Domain\Models\TimeLimit\Entities\TimeLimitEntity;
use Packages\Domain\Models\TimeLimit\ValueObjects\TimeLimitId;

interface TimeLimitInterface
{
    /** @var TimeLimitEntity[] */
	public function nonDeleteTimeLimits(): array;

	public function createTimeLimit(CreateTimeLimit $createTimeLimit): void;
	public function deleteTimeLimit(TimeLimitId $timeLimitId): void;
}
