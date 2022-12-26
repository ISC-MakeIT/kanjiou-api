<?php

namespace Packages\Domain\Rank\Entities;

use Packages\Domain\Rank\ValueObjects\RankOrder;

final class JudgedRankedIn {
    private RankOrder $rankOrder;

    private function __construct(
        RankOrder $rankOrder
    ) {
        $this->rankOrder   = $rankOrder;
    }

    public function rankOrder(): RankOrder {
        return $this->rankOrder;
    }

    public function toJson(): array {
        if ($this->rankOrder->isEmpty()) {
            return ['isRankedIn' => false];
        }

        return [
            'isRankedIn' => true,
            'rankOrder'  => $this->rankOrder()->value()
        ];
    }

    public static function from(
        RankOrder $rankOrder
    ): JudgedRankedIn {
        return new JudgedRankedIn(
            $rankOrder,
        );
    }
}
