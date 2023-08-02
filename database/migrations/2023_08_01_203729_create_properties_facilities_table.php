<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePropertiesFacilitiesTable extends Migration {

	public function up()
	{
		Schema::create('properties_facilities', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('property_id')->unsigned();
			$table->integer('facility_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('properties_facilities');
	}
}