<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');

            $table->string('email', 254);
            $table->string('password', 254);
			$table->timestamp('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
