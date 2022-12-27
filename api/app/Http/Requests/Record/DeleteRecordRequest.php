<?php

namespace App\Http\Requests\Record;

use Illuminate\Foundation\Http\FormRequest;
use Packages\Domain\Record\ValueObjects\RecordId;

class DeleteRecordRequest extends FormRequest {
    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
        ];
    }

    public function toDomain(): RecordId {
        return RecordId::from($this->recordId);
    }
}
