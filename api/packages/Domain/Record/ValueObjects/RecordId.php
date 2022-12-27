<?php

namespace Packages\Domain\Record\ValueObjects;

use Packages\Domain\PositiveNumber;

final class RecordId extends PositiveNumber {
    protected string $name = 'レコードID';
}
