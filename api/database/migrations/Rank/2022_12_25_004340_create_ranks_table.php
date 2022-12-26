<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    private string $tableName = 'ranks';

    public function up(): void {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->id('rank_id');

            $table->foreignId('game_mode_id', 8);
            $table->string('name', 8);
            $table->integer('seconds_left', false, true);
            $table->timestamp('created_at');
        });
    }

    public function down(): void {
        Schema::drop($this->tableName);
    }
};
