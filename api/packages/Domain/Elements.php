<?php

namespace Packages\Domain;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class Elements implements DomainModel {
    protected $value;
    protected string $name;

    private function __construct($value) {
        $this->value = $value;
    }

    public function value(): array {
        return $this->value;
    }

    public function add($value): static {
        return static::from(array_merge($this->value(), [$value]));
    }

    public function copyOfRange(int $start, int $end): static {
        $filtered = [];

        foreach ($this->value() as $indexOfArray => $element) {
            $index = $indexOfArray + 1;

            if ($index >= $start && $index <= $end) {
                $filtered[] = $element;
            }
        }

        return new static($filtered);
    }

    public function isEmpty(): bool {
        return count($this->value) === 0;
    }

    public function hasItem(): bool {
        return !$this->isEmpty();
    }

    public function first() {
        return $this->value[0];
    }

    public function isValidationFailed(): bool {
        return count($this->validatedMessages()) !== 0;
    }

    public function validatedMessages(): array {
        return Validator::make(
            [$this->name => $this->value],
            [$this->name => ['array']],
            ['array'     => ':attributeは配列である必要があります。']
        )->getMessageBag()->toArray();
    }

    public static function from($value): static {
        $valueObject = new static($value);

        if ($valueObject->isValidationFailed()) {
            throw ValidationException::withMessages($valueObject->validatedMessages());
        }

        return $valueObject;
    }
}
