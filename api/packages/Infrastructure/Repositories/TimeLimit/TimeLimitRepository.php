<?php

namespace Packages\Infrastructure\Repositories\TimeLimit;

use Illuminate\Support\Collection;
use Packages\Domain\Models\TimeLimit\TimeLimitInterface;
use Packages\Domain\Models\TimeLimit\Entities\CreateTimeLimit;
use Packages\Domain\Models\TimeLimit\Entities\TimeLimitEntity;
use Packages\Domain\Models\TimeLimit\ValueObjects\TimeLimitId;
use Packages\Infrastructure\EloquentModels\TimeLimit\TimeLimit as EloquentTimeLimit;
use Packages\Infrastructure\EloquentModels\TimeLimit\TimeLimitDelete;

final class TimeLimitRepository implements TimeLimitInterface
{
    /** @return TimeLimitEntity[] */
	public function nonDeleteTimeLimits(): array
    {
        /** @var Collection */
		$timeLimitEntities = EloquentTimeLimit::doesntHave('delete')
            ->orderBy('seconds', 'desc')
            ->take(100)
            ->get()
            ->map(function(EloquentTimeLimit $eloquentTimeLimit) {
                return new TimeLimitEntity(
                    $eloquentTimeLimit->ofDomain(),
                    null
                );
            });
        return $timeLimitEntities->toArray();
    }

	public function nonDeleteTimeLimit(TimeLimitId $timeLimitId): TimeLimitEntity
    {
		return EloquentTimeLimit::doesntHave('delete')
            ->findOrFail($timeLimitId->value())
            ->ofDomain();
    }

	public function createTimeLimit(CreateTimeLimit $createTimeLimit): void
    {
        EloquentTimeLimit::create([
            'name'      => $createTimeLimit->name()->value(),
            'seconds'   => $createTimeLimit->seconds()->value()
        ]);
    }

	public function deleteTimeLimit(TimeLimitId $timeLimitId): void
    {
        TimeLimitDelete::updateOrCreate([
            'time_limit_id' => $timeLimitId->value()
        ]);
    }
}
