<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoomsTable extends Migration {

	public function up()
	{
		Schema::create('rooms', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 255);
			$table->text('description');
			$table->string('price');
			$table->string('size', 255);
			$table->string('amenities', 255);
			$table->integer('total_bathrooms');
			$table->integer('total_balconies');
			$table->integer('total_guests');
			$table->string('featured_photo');
			$table->integer('property_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('rooms');
	}
}