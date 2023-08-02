<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNotificationsTable extends Migration {

	public function up()
	{
		Schema::create('notifications', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('notifiable_type', 100);
			$table->integer('notifiable_id');
			$table->text('data');
		});
	}

	public function down()
	{
		Schema::drop('notifications');
	}
}