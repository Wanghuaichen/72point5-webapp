<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateSampleTableAddErrorCode extends Migration
{
    /**
     * Add the error code column to the Sample table
     *
     * @return void
     */
    public function up()
    {
		Schema::table('sample', function (Blueprint $table) {
			$table->char('error', 1);
		});
    }

    /**
	 * Reverse the addition of the error code column from
	 * the Sample table 
     *
     * @return void
     */
    public function down()
    {
		Schema::table('sample', function (Blueprint $table) {
			$table->drop('error');
		});
    }
}
