<?php

namespace App\Http\Requests\Record;

use Illuminate\Foundation\Http\FormRequest;
use Packages\Domain\Error\Entities\ErrorList;
use Packages\Domain\GameMode\ValueObjects\GameMode;
use Packages\Domain\Record\Entities\InitRecord;
use Packages\Domain\Record\ValueObjects\Name;
use Packages\Domain\Record\ValueObjects\SecondsLeft;

class RegisterRecordRequest extends FormRequest {
    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
        ];
    }

    public function toDomain(): InitRecord {
        $errorList = ErrorList::from([]);

        $initRank = InitRecord::from(
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
