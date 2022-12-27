<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Packages\Infrastructure\EloquentModels\Record\Record;

class RecordSeeder extends Seeder {
    public function run(): void {
        Record::factory(100)->create();
    }
}
