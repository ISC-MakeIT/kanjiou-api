<?php

namespace Packages\Domain;

interface DomainModel {
    public function isValidationFailed(): bool;
    public function validatedMessages(): array;
}
