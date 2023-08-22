<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoomsTable extends Migration {

	public function up()
	{
		Schema::create('rooms', function(Blueprint $table) {
			$table->increments('id');
			$table->char('room_number');
			$table->text('description');
			$table->string('nightly_rate');
			$table->decimal('price');
			$table->enum('room_type', ['single', 'double', 'deluxe','suite'])->default('single');
			$table->string('amenities', 255);
			$table->date('availability_date_start');
 			$table->date('availability_date_end');
			$table->text('occupancy_limit')->nullable();
			$table->string('Additional_fees');
            $table->text('total_beds')->nullable();
            $table->text('total_bathrooms')->nullable();
            $table->text('total_balconies')->nullable();
            $table->text('total_guests')->nullable();
			$table->string('featured_photo');
			$table->integer('property_id')->unsigned();
			$table->text('video_id')->nullable();
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('rooms');
	}
}
