<?php

namespace Packages\Domain;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class StringBetweenLimit implements DomainModel {
    protected $value;
    protected int $lengthMinimum = 0;
    protected int $lengthMaximum;
    protected string $name;

    private function __construct($value) {
        $this->value = $value;
    }

    private function isEmptylengthMinimum(): bool {
        return $this->lengthMinimum === 0;
    }

    public function value(): string {
        return $this->value;
    }

    public function isValidationFailed(): bool {
        return count($this->validatedMessages()) !== 0;
    }

    public function validatedMessages(): array {
        $rules = ['required', "between:{$this->lengthMinimum},{$this->lengthMaximum}"];

        if ($this->isEmptylengthMinimum()) {
            unset($rules[1]);
            $rules[] = "max:{$this->lengthMaximum}";
        }

        return Validator::make(
            [$this->name => $this->value],
            [$this->name => $rules],
            [
                'required' => ':attributeは必須項目です。',
                'between'  => ':attributeは :min〜:max 文字以内で入力してください。',
                'max'      => ':attributeは :max 文字以内で入力してください。',
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
