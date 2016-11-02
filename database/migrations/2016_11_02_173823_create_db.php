<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDb extends Migration
{
    /**
     * Initialize the db 
     *
     * @return void
     */
    public function up()
    {
		Schema::create('cow', function (Blueprint $table) {
			$table->increments('id');
		});

		Schema::create('sample', function (Blueprint $table) {
			$table->increments('id');
			$table->float('body_temp', 4, 2);
			$table->float('ext_temp', 4, 2);
			$table->float('x', 4, 2);
			$table->float('y', 4, 2);
			$table->float('z', 4, 2);
			$table->integer('respire')->unsigned();
			$table->integer('cow_id')->unsigned();
			$table->foreign('cow_id')->references('id')->on('cow');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
	{
		Schema::drop('sample');
		Schema::drop('cow');
    }
}
