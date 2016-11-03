<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSampleAddTime extends Migration
{
    /**
     * Run the migrations.
	 *
	 * Add the timestamp field to the cow samples
     *
     * @return void
     */
    public function up()
    {
		Schema::table('sample', function (Blueprint $table) {
			$table->integer('timestamp')->unsigned();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::table('sample', function (Blueprint $table) {
			$table->drop('timestamp');;	
		});
    }
}
