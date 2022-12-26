<?php

namespace Packages\Domain\Rank\Entities;

use Packages\Domain\Elements;

final class RankList extends Elements {
    /** @return Rank[] */
    public function value(): array {
        return parent::value();
    }
}
