<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSiteSettingsTable extends Migration {

	public function up()
	{
		Schema::create('site_settings', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('logo', 255);
			$table->string('address', 255);
			$table->string('support_phone');
			$table->string('email', 100);
			$table->text('copyright');
			$table->string('facebook', 255);
			$table->string('twitter', 255);
		});
	}

	public function down()
	{
		Schema::drop('site_settings');
	}
}