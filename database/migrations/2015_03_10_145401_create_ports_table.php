<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ports', function(Blueprint $table)
		{
                    $table->increments('id');
                    $table->integer('module_id')->unsigned();
                    $table->string('name');
                    $table->integer('port_number');
                    $table->text('notes');
                    $table->timestamps();
                    
                    $table->foreign('module_id')
                       ->references('id')
                       ->on('modules')
                       ->onDelete('cascade');                       
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ports');
	}

}
