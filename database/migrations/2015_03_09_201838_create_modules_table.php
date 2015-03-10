<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('modules', function(Blueprint $table)
		{
                        $table->increments('id');
                        $table->integer('node_id')->unsigned();
                        $table->string('name');
                        $table->integer('slot_number');
                        $table->integer('port_count');
                        $table->text('notes');
                        $table->timestamps();
                        
                        $table->foreign('node_id')
                           ->references('id')
                           ->on('nodes')
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
		Schema::drop('modules');
	}

}
