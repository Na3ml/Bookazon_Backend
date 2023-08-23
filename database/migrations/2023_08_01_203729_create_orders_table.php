<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	public function up()
	{
		Schema::create('orders', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('room_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->bigInteger('order_no');
			$table->datetime('booking_date');
			$table->datetime('check_in_date');
			$table->datetime('check_out_date');
			$table->string('transaction_id', 100);
			$table->float('paid_amount');
			$table->string('status', 50);
			$table->string('payment_method', 255);
		});
	}

	public function down()
	{
		Schema::drop('orders');
	}
}
