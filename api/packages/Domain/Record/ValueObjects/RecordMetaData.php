<?php

namespace Packages\Domain\Record\ValueObjects;

final class RecordMetaData {
    private Name $name;
    private SecondsLeft $secondsLeft;

    private function __construct(
        Name $name,
        SecondsLeft $secondsLeft,
    ) {
        $this->name        = $name;
        $this->secondsLeft = $secondsLeft;
    }

    public function name(): Name {
        return $this->name;
    }

    public function secondsLeft(): SecondsLeft {
        return $this->secondsLeft;
    }

    public static function from(
        Name $name,
        SecondsLeft $secondsLeft
    ): RecordMetaData {
        return new RecordMetaData(
            $name,
            $secondsLeft,
        );
    }
}
