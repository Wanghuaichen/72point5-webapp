<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNormalSampleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('normal_sample', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('timestamp')->unsigned();
			$table->float('body_temp', 4, 2);
			$table->float('ext_temp', 4, 2);
			$table->integer('heart_rate')->unsigned();
			$table->integer('cow_id')->unsigned();
			$table->foreign('cow_id')->references('id')->on('cow');
		});

		Schema::create('accel_sample', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('timestamp')->unsigned();
			$table->float('x', 4, 2);
			$table->float('y', 4, 2);
			$table->float('z', 4, 2);
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
		Schema::drop('normal_sample');
		Schema::drop('accel_sample');
    }
}
