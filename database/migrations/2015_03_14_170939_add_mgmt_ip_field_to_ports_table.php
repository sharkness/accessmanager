<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMgmtIpFieldToPortsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ports', function(Blueprint $table)
		{
			$table->string('mgmt_ip');
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
			$table->dropColumn('mgmt_ip');
		});
	}

}
