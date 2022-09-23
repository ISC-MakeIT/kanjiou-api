<?php

namespace Packages\Infrastructure\Repositories\TimeLimit;

use Packages\Domain\Models\TimeLimit\Entities\InitTimeLimit;
use Packages\Infrastructure\EloquentModels\TimeLimit\TimeLimit;

final class InitTimeLimitRepository {
	public function createTimeLimit(InitTimeLimit $initTimeLimit): void {
        TimeLimit::create([
            'name'      => $initTimeLimit->name()->value(),
            'seconds'   => $initTimeLimit->seconds()->value()
        ]);
    }
}
