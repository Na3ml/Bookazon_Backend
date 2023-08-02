<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVideosTable extends Migration {

	public function up()
	{
		Schema::create('videos', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('video_id', 255);
			$table->text('caption');
			$table->string('video_path', 255);
			$table->integer('property_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('videos');
	}
}