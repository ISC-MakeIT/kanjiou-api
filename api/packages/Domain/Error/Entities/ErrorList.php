<?php

namespace Packages\Domain\Error\Entities;

use Illuminate\Validation\ValidationException;
use Packages\Domain\DomainModel;

final class ErrorList {
    private array $value = [];

    private function __construct($value) {
        $this->value = $value;
    }

    public function isEmpty(): bool {
        return count($this->value) === 0;
    }

    public function addIfError(DomainModel $valueObject): ErrorList {
        if ($valueObject->isValidationFailed()) {
            return ErrorList::from(array_merge(
                $this->value,
                $valueObject->validatedMessages()
            ));
        }

        return ErrorList::from($this->value);
    }

    /**
     * @throws ValidationException
     */
    public function throwIf(): void {
        if ($this->isEmpty()) {
            return;
        }

        throw ValidationException::withMessages($this->value);
    }

    public static function from(array $value): ErrorList {
        return new ErrorList($value);
    }
}
