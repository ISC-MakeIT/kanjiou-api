<?php

namespace Packages\Domain\User\ValueObjects;

use Illuminate\Support\Facades\Validator;
use Packages\Domain\StringBetweenLimit;

final class Password extends StringBetweenLimit {
    protected int $lengthMinimum = 8;
    protected int $lengthMaximum = 255;
    protected string $name       = 'パスワード';

    public function validatedMessages(): array {
        $parentValidatedMessages = parent::validatedMessages();

        return array_merge(
            Validator::make(
                    [$this->name => $this->value()],
                    [$this->name => [
                    'regex:/[a-z]/',
                    'regex:/[A-Z]/',
                    'regex:/[0-9]/',
                ]],
                    [
                    'regex' => ':attributeは大文字・小文字・数字が含まれていなければなりません。',
                ]
                )->getMessageBag()->toArray(),
            $parentValidatedMessages
        );
    }

    public function toHashValue(): string {
        return bcrypt($this->value());
    }
}
