<?php

namespace App\Http\Requests\Rank;

use Illuminate\Foundation\Http\FormRequest;
use Packages\Domain\Error\Entities\ErrorList;
use Packages\Domain\GameMode\ValueObjects\GameMode;
use Packages\Domain\Rank\Entities\InitRank;
use Packages\Domain\Rank\ValueObjects\Name;
use Packages\Domain\Rank\ValueObjects\SecondsLeft;

class RegisterRankRequest extends FormRequest {
    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
        ];
    }

    public function ofDomain(): InitRank {
        $errorList = ErrorList::from([]);

        $initRank = InitRank::from(
            GameMode::from($this->gameMode),
            Name::unsafetyFrom($this->name),
            SecondsLeft::unsafetyFrom($this->secondsLeft)
        );

        $errorList = $errorList->addIfError($initRank->name());
        $errorList = $errorList->addIfError($initRank->secondsLeft());

        $errorList->throwIf();

        return $initRank;
    }
}
