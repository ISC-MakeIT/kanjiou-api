<?php

namespace Packages\Service\Record\Command;

use Packages\Domain\Record\Entities\InitRecord;
use Packages\Infrastructure\Repositories\Record\RegisterRecordRepository;

final class RegisterRecordService {
    private RegisterRecordRepository $registerRecordRepository;

    public function __construct(RegisterRecordRepository $registerRecordRepository) {
        $this->registerRecordRepository = $registerRecordRepository;
    }

    public function registerRecord(InitRecord $initRecord): void {
        $this->registerRecordRepository->registerRecord($initRecord);
    }
}
