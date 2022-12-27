<?php

namespace Packages\Infrastructure\Repositories\Record;

use Illuminate\Support\Facades\DB;
use Packages\Domain\Record\ValueObjects\RecordId;
use Packages\Exception\Record\FailDeleteRecordException;

final class DeleteRecordRepository {
    public function deleteRecord(RecordId $recordId): void {
        $deleteRecordCount = DB::delete('
            DELETE FROM records
            WHERE
                record_id = ?
        ', [$recordId->value()]);

        if ($deleteRecordCount === 0) {
            throw new FailDeleteRecordException();
        }
    }
}
