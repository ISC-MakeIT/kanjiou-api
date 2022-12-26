<?php

namespace App\Http\Controllers\Normal;

use App\Http\Controllers\Controller;
use App\Http\Requests\Record\RegisterRecordRequest;
use Packages\Service\Record\Command\RegisterRecordService;

final class RecordController extends Controller {
    private RegisterRecordService $registerRecordService;

    public function __construct(RegisterRecordService $registerRecordService) {
        $this->registerRecordService = $registerRecordService;
    }

    public function registerRecord(RegisterRecordRequest $request): void {
        $this->registerRecordService->registerRecord($request->toDomain());
    }
}
