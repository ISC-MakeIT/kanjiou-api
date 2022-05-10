<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class() extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::statement('
            CREATE VIEW time_limit_ranks AS
                SELECT
                    name,
                    seconds,
                    RANK() OVER (ORDER BY seconds DESC) AS `rank`
                FROM time_limits limit 100
        ');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::statement('DROP VIEW time_limit_ranks');
	}
};
