<?php

namespace Packages\Domain\Record\ValueObjects;

use Packages\Domain\DateTime;

final class RecordedAt extends DateTime {
    protected string $name = '記録した時間';
}
