<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
	public function up(): void
	{
		Schema::create('time_limits', function (Blueprint $table) {
			$table->id('time_limit_id')->index();

			$table->string('name', 8);
			$table->integer('seconds', false, true);
			$table->timestamp('created_at');
		});
	}

	public function down(): void
	{
		Schema::dropIfExists('time_limits');
	}
};
