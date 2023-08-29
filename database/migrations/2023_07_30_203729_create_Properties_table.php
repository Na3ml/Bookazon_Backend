<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePropertiesTable extends Migration {

	public function up()
	{
		Schema::create('Properties', function(Blueprint $table) {
			$table->increments('id');
			$table->string('slug')->unique();
			$table->char('property_name', 255);
			$table->char('property_code');
			$table->integer('property_status');
			$table->float('price');
			$table->text('description');
			$table->string('property_thumbnail', 255)->nullable();
			$table->string('property_size', 255);
			$table->string('address', 255);
			$table->string('country', 255);
			$table->string('state', 255);
			$table->string('city', 255);
			$table->string('Additional_fees');
			$table->timestamp('availability_date_start');
 			$table->timestamp('availability_date_end')->nullable();
			$table->string('longitude', 255)->nullable();
			$table->string('latitude', 255)->nullable();
			$table->string('hot', 255)->nullable();
			$table->string('featured', 255)->nullable();
			$table->integer('user_id')->unsigned();
			$table->string('amenities_id',255);
			$table->integer('ptype_id')->unsigned();
			$table->timestamps();

		});
	}

	public function down()
	{
		Schema::drop('Properties');
	}
}
