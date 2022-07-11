<?php

namespace Packages\Assembler;

use Packages\Domain\Models\TimeLimit\Entities\TimeLimitEntity;
use Packages\Domain\Models\TimeLimit\ValueObjects\Seconds;

final class TimeLimitAssember
{
    /** @param TimeLimitEntity[] */
    public function timeLimitEntitiesOfJson(array $timeLimitEntities): array
    {
        $result = [];
        $maxRank = 1;
        $minSeconds = 60;
        foreach ($timeLimitEntities as $index => $timeLimitEntity) {
            $result[] = $this->timeLimitEntityOfJson(
                $timeLimitEntity,
                $maxRank,
                $minSeconds,
                $index
            );
        }
        return $result;
    }

    public function timeLimitEntityOfJson(
        TimeLimitEntity $timeLimitEntity,
        int &$maxRank,
        int &$minSeconds,
        int $index,
    ): array
    {
        if ($minSeconds > $timeLimitEntity->timeLimit()->seconds()->value()) {
            $minSeconds = $timeLimitEntity->timeLimit()->seconds()->value();
            $maxRank = $index + 1;
            return [
                'rank'      => $maxRank,
                'seconds'   => $timeLimitEntity->timeLimit()->seconds()->value(),
                'name'      => $timeLimitEntity->timeLimit()->name()->value()
            ];
        }
        if ($minSeconds === $timeLimitEntity->timeLimit()->seconds()->value()) {
            return [
                'rank'      => $maxRank,
                'seconds'   => $timeLimitEntity->timeLimit()->seconds()->value(),
                'name'      => $timeLimitEntity->timeLimit()->name()->value()
            ];
        }
        return [
            'rank'      => $index + 1,
            'seconds'   => $timeLimitEntity->timeLimit()->seconds()->value(),
            'name'      => $timeLimitEntity->timeLimit()->name()->value()
        ];
    }

    public function timeLimitSecondOfJson(array $timeLimitEntities, Seconds $seconds): array
    {
        $timeLimits = $this->timeLimitEntitiesOfJson($timeLimitEntities);
        $rank = 1;
        foreach ($timeLimits as $index => $timeLimit) {
            if ($index == count($timeLimits) - 1 && $seconds->value() != $timeLimit['seconds']) {
                $rank = $index + 1;
                break;
            }
            if ($seconds->value() <= $timeLimit['seconds']) {
                $rank = $timeLimit['rank'];
                continue;
            }
            if ($seconds->value() > $timeLimit['seconds']) break;
        }
        return ['rank' => $rank];
    }
}
