<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('first_name', 255);
			$table->string('last_name', 255);
			$table->string('password');
			$table->string('email', 100)->unique();
			$table->string('phone_number', 50)->nullable();
			$table->string('address', 500)->nullable();
			$table->enum('gender', array('male', 'female'))->nullable();
			$table->enum('role', array('superadmin', 'Propertyowner', 'booker'))->default('booker');
			$table->string('profile_picture', 255)->nullable();
			$table->enum('status', array('active', 'inactive'))->nullable();
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}
