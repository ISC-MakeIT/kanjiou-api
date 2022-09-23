<?php

namespace Packages\Domain\Models\TimeLimit\Entities;

use Packages\Domain\Models\TimeLimit\ValueObjects\Seconds;
use Packages\Domain\Exceptions\TimeLimit\OutOfRankingException;

final class TimeLimitList {
    /** @var TimeLimit[] */
    private array $timeLimitList;

    public function __construct(array $timeLimitList) {
        $this->timeLimitList = $timeLimitList;
    }

    public function addTimeLimit(TimeLimit $timeLimit): TimeLimitList {
        return new static(array_merge($this->timeLimitList, [$timeLimit]));
    }

    public function ofJson(): array {
        $result = [];
        foreach ($this->timeLimitList as $timeLimit) {
            $result[] = $timeLimit->ofJson();
        }
        return $result;
    }

    public function ofRanksJson(): array {
        $result = [];
        $maxRank = 1;
        $minSeconds = 60;
        foreach ($this->timeLimitList as $index => $timeLimit) {
            if ($minSeconds > $timeLimit->seconds()->value()) {
                $minSeconds = $timeLimit->seconds()->value();
                $maxRank = $index + 1;
                $result[] = $timeLimit->ofJson() + ['rank' => $maxRank];
                continue;
            }
            if ($minSeconds === $timeLimit->seconds()->value()) {
                $result[] = $timeLimit->ofJson() + ['rank' => $maxRank];
                continue;
            }
            $result[] = $timeLimit->ofJson() + ['rank' => $index + 1];
            continue;
        }
        return $result;
    }

    public function ofRankJsonFromSeconds(Seconds $seconds): array {
        $timeLimits = $this->ofRanksJson();
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
        if ($rank === 100) throw new OutOfRankingException();
        return ['rank' => $rank];
    }
}
