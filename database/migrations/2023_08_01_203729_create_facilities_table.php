<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFacilitiesTable extends Migration {

	public function up()
	{
		Schema::create('facilities', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('facility_name', 255);
		});
	}

	public function down()
	{
		Schema::drop('facilities');
	}
}