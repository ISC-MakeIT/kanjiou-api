<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Record\DeleteRecordRequest;
use Illuminate\Http\RedirectResponse;
use Packages\Service\Record\Command\DeleteRecordService;

final class RecordController extends Controller {
    private DeleteRecordService $deleteRecordService;

    public function __construct(
        DeleteRecordService $deleteRecordService
    ) {
        $this->deleteRecordService = $deleteRecordService;
    }

    public function deleteRecord(DeleteRecordRequest $request): RedirectResponse {
        $this->deleteRecordService->deleteRecord($request->toDomain());

        return redirect('/earthAdmin/ranks/default');
    }
}
