<?php

namespace Packages\Domain;

use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class DateTime implements DomainModel {
    protected $value;
    protected string $name;

    private function __construct($value) {
        $this->value = $value;
    }

    public function value(): CarbonImmutable {
        return $this->value;
    }

    public function isValidationFailed(): bool {
        return count($this->validatedMessages()) !== 0;
    }

    public function validatedMessages(): array {
        return Validator::make(
            [$this->name => $this->value],
            [$this->name => ['date']],
            ['date'      => ':attributeは時間である必要があります。']
        )->getMessageBag()->toArray();
    }

    public function formatDateTime(): string {
        return $this->value()->toDateTimeString();
    }

    public static function from($value): static {
        $valueObject = new static($value);

        if ($valueObject->isValidationFailed()) {
            throw ValidationException::withMessages($valueObject->validatedMessages());
        }

        return $valueObject;
    }
}
