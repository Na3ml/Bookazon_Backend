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
			$table->string('distance');
			$table->integer('property_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('facilities');
	}
}