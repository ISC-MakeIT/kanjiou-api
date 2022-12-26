<?php

namespace App\Http\Requests\Rank;

use Illuminate\Foundation\Http\FormRequest;
use Packages\Domain\Error\Entities\ErrorList;
use Packages\Domain\GameMode\ValueObjects\GameMode;
use Packages\Domain\Rank\Entities\JudgeRankedIn;
use Packages\Domain\Rank\ValueObjects\SearchRankCount;
use Packages\Domain\Record\ValueObjects\SecondsLeft;

class IsRankedInRequest extends FormRequest {
    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
        ];
    }

    public function toParams(): string {
        $judgeRankedIn = $this->toDomain();

        return '?' . substr($judgeRankedIn->gameMode()->toParams() . $judgeRankedIn->rankCount()->toParams(), 1);
    }

    public function toDomain(): JudgeRankedIn {
        $judgeRankedIn = JudgeRankedIn::from(
            GameMode::from($this->gameMode),
            SecondsLeft::unsafetyFrom($this->secondsLeft),
            SearchRankCount::elseDefaultHundredValue($this->rankCount)
        );

        $errorList = ErrorList::from([]);

        $errorList = $errorList->addIfError($judgeRankedIn->rankCount());
        $errorList = $errorList->addIfError($judgeRankedIn->secondsLeft());

        $errorList->throwIf();

        return $judgeRankedIn;
    }
}
