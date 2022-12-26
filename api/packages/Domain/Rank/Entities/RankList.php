<?php

namespace Packages\Domain\Rank\Entities;

use Packages\Domain\Elements;

final class RankList extends Elements {
    protected string $name = 'ランキングのリスト';

    /** @return Rank[] */
    public function value(): array {
        return parent::value();
    }

    public function findByNamePointer(): ?Rank {
        foreach ($this->value() as $rank) {
            if ($rank->name()->hasPointer()) {
                return $rank;
            }
        }

        return null;
    }

    public function toJson(): array {
        return array_map(fn ($rank) => $rank->toJson(), $this->value());
    }
}
