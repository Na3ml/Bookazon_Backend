<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePropertyTypesTable extends Migration {

	public function up()
	{
		Schema::create('property_types', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('type_name', 255);
			$table->string('type_icon', 255);
		});
	}

	public function down()
	{
		Schema::drop('property_types');
	}
}