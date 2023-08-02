<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePhotosTable extends Migration {

	public function up()
	{
		Schema::create('photos', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('photo', 255);
			$table->integer('property_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('photos');
	}
}