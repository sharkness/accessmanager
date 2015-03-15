<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsMonitoredFieldToPortsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ports', function(Blueprint $table)
		{
			$table->integer('is_monitored')->unsigned();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('ports', function(Blueprint $table)
		{
			$table->dropColumn('is_monitored');
		});
	}

}
