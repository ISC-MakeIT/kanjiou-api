<?php

namespace Packages\Infrastructure\Repositories\TimeLimit;

use Packages\Domain\Models\TimeLimit\ValueObjects\TimeLimitId;
use Packages\Infrastructure\EloquentModels\TimeLimit\TimeLimitDelete;

final class DeleteTimeLimitRepository {
	public function deleteTimeLimit(TimeLimitId $timeLimitId): void {
        TimeLimitDelete::updateOrCreate([
            'time_limit_id' => $timeLimitId->value()
        ]);
    }
}
