<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePropertiesTable extends Migration {

	public function up()
	{
		Schema::create('Properties', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->uuid('UUID');
			$table->integer('prorerty_code');
			$table->integer('property_status');
			$table->float('price');
			$table->text('description');
			$table->string('property_size', 255);
			$table->string('address', 255);
			$table->string('country', 255);
			$table->string('city', 255);
			$table->string('Additional_fees');
			$table->string('longitude', 255);
			$table->string('latitude', 255);
			$table->string('status', 255);
			$table->string('hot', 255);
			$table->string('featured', 255);
			$table->integer('user_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('Properties');
	}
}