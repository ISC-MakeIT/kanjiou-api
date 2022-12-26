<?php

namespace App\Http\Requests\Rank;

use Illuminate\Foundation\Http\FormRequest;
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
        $searchRankCount = $this->toDomain();

        return '?' . substr($searchRankCount->toParams(), 1);
    }

    public function toDomain(): SearchRankCount {
        return SearchRankCount::elseHundredValue($this->rankCount);
    }
}
