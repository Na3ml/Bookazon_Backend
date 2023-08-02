<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRatePropertyTable extends Migration {

	public function up()
	{
		Schema::create('rate_property', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('user_id')->unsigned();
			$table->integer('proprty_id')->unsigned();
			$table->text('comment');
		});
	}

	public function down()
	{
		Schema::drop('rate_property');
	}
}