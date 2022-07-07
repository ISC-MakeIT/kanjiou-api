<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('time_limit_deletes', function (Blueprint $table) {
            $table->foreignId('time_limit_id')->primary();

			$table->timestamp('created_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('time_limit_deletes');
    }
};
