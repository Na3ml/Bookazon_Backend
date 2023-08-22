<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->string('first_name', 255);
			$table->string('last_name', 255);
			$table->string('password')->nullable();;
			$table->string('email', 100)->unique();
			$table->string('phone_number', 50)->nullable();
			$table->string('address', 500)->nullable();
			$table->enum('gender', array('male', 'female'))->nullable();
  			$table->foreignId('role_id')->constrained();
  			$table->string('profile_picture', 255)->nullable();
			$table->enum('status', array('active', 'inactive'))->nullable();
			$table->timestamp('email_verified_at')->nullable();
        	$table->rememberToken();
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}
