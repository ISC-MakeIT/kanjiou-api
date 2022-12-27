<?php

namespace App\Http\Controllers\Normal;

use App\Http\Controllers\Controller;
use App\Http\Requests\Record\DeleteRecordRequest;
use App\Http\Requests\Record\RegisterRecordRequest;
use Illuminate\Http\RedirectResponse;
use Packages\Service\Record\Command\DeleteRecordService;
use Packages\Service\Record\Command\RegisterRecordService;

final class RecordController extends Controller {
    private RegisterRecordService $registerRecordService;
    private DeleteRecordService $deleteRecordService;

    public function __construct(
        RegisterRecordService $registerRecordService,
        DeleteRecordService $deleteRecordService
    ) {
        $this->registerRecordService = $registerRecordService;
        $this->deleteRecordService   = $deleteRecordService;
    }

    public function registerRecord(RegisterRecordRequest $request): void {
        $this->registerRecordService->registerRecord($request->toDomain());
    }
}
