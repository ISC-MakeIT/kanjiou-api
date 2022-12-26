<?php

namespace Tests\Feature\Record;

use App\Http\Requests\Record\RegisterRecordRequest;
use Packages\Domain\GameMode\ValueObjects\GameMode;
use Packages\Infrastructure\EloquentModels\Record\Record;
use Tests\DBRefreshTestCase;

class RegisterRecordTest extends DBRefreshTestCase {
    public function test_レコードの登録を行えること(): void {
        Record::query()->delete();

        $request = new RegisterRecordRequest([
            'secondsLeft' => 1,
            'name'        => 'test',
            'gameMode'    => GameMode::ONE_DOG_AMOUNG_SHEEP->ofJa(),
        ]);

        $response = $this->post('/api/records', $request->all());
        $response->assertOk();
        $this->assertCount(1, Record::all()->toArray());
    }
}
