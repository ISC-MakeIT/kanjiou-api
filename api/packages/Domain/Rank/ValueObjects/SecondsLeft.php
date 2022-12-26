<?php

namespace Packages\Domain\Rank\ValueObjects;

use Illuminate\Support\Facades\Validator;
use Packages\Domain\PositiveNumber;

final class SecondsLeft extends PositiveNumber {
    protected string $name = '残り秒数';

    public function validatedMessages(): array {
        $parentMessages = parent::validatedMessages();

        $messages = Validator::make(
            [$this->name => $this->value()],
            [$this->name => ['max:60']],
            [
                'max' => ':attributeは60秒を超過しています。',
            ]
        )->getMessageBag()->toArray();

        return array_merge($parentMessages, $messages);
    }
}
