<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAmenitiesTable extends Migration {

	public function up()
	{
		Schema::create('amenities', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('amenities_name', 255);
		});
	}

	public function down()
	{
		Schema::drop('amenities');
	}
}