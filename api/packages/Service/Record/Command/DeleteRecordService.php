<?php

namespace Packages\Service\Record\Command;

use Packages\Domain\Record\ValueObjects\RecordId;
use Packages\Infrastructure\Repositories\Record\DeleteRecordRepository;

final class DeleteRecordService {
    private DeleteRecordRepository $deleteRecordRepository;

    public function __construct(DeleteRecordRepository $deleteRecordRepository) {
        $this->deleteRecordRepository = $deleteRecordRepository;
    }

    public function deleteRecord(RecordId $recordId): void {
        $this->deleteRecordRepository->deleteRecord($recordId);
    }
}
