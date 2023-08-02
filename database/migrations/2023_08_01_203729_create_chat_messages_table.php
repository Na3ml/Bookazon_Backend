<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChatMessagesTable extends Migration {

	public function up()
	{
		Schema::create('chat_messages', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('sender_id')->unsigned();
			$table->integer('receiver_id')->unsigned();
			$table->text('msg');
		});
	}

	public function down()
	{
		Schema::drop('chat_messages');
	}
}