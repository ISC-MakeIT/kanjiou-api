<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('time_limit_deletes', function (Blueprint $table) {
			$table->string('name', 8);
			$table->integer('seconds', false, true);
			$table->timestamp('created_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('time_limit_deletes');
    }
};
