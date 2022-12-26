<?php

namespace Packages\Domain;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class PositiveNumber implements DomainModel {
    protected $value;
    protected string $name;

    private function __construct($value) {
        $this->value = $value;
    }

    public function value(): int {
        return $this->value;
    }

    public function isValidationFailed(): bool {
        return count($this->validatedMessages()) !== 0;
    }

    public function validatedMessages(): array {
        $rules = ['required', 'min:0'];

        return Validator::make(
            [$this->name => $this->value],
            [$this->name => $rules],
            [
                'required' => ':attributeは必須項目です。',
                'min'      => ':attribute正数でなければなりません。',
            ]
        )->getMessageBag()->toArray();
    }

    public static function from($value): static {
        $valueObject = new static($value);

        if ($valueObject->isValidationFailed()) {
            throw ValidationException::withMessages($valueObject->validatedMessages());
        }

        return $valueObject;
    }

    public static function unsafetyFrom($value): static {
        return new static($value);
    }
}
