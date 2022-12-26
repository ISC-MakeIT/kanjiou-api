<?php

namespace App\Http\Requests\Rank;

use Illuminate\Foundation\Http\FormRequest;
use Packages\Domain\GameMode\ValueObjects\GameMode;
use Packages\Domain\Rank\Entities\SearchRankList;
use Packages\Domain\Rank\ValueObjects\SearchRankCount;

class RankListRequest extends FormRequest {
    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
        ];
    }

    public function toParams(): string {
        $searchRankList = $this->toDomain();

        return '?' . substr($searchRankList->gameMode()->toParams() . $searchRankList->rankCount()->toParams(), 1);
    }

    public function toDomain(): SearchRankList {
        return SearchRankList::from(
            GameMode::elseDefaultOldestGameModeValue($this->gameMode),
            SearchRankCount::elseDefaultHundredValue($this->rankCount)
        );
    }
}
