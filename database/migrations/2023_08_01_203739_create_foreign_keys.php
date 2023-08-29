<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
    Schema::table('photos', function (Blueprint $table) {
        $table->foreign('property_id')->references('id')->on('Properties')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
    });
    Schema::table('Properties', function (Blueprint $table) {
        $table->foreign('user_id')->references('id')->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
    });
    Schema::table('Properties', function (Blueprint $table) {
        $table->foreign('ptype_id')->references('id')->on('property_types')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
    });

    // Schema::table('rooms', function (Blueprint $table) {
    //     $table->foreign('room_id')->references('id')->on('rooms')
    //                 ->onDelete('cascade')
    //                 ->onUpdate('cascade');
    // });



    Schema::table('facilities', function (Blueprint $table) {
        $table->foreign('property_id')->references('id')->on('Properties')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
    });


    Schema::table('rate_property', function (Blueprint $table) {
        $table->foreign('user_id')->references('id')->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
    });
    Schema::table('rate_property', function (Blueprint $table) {
        $table->foreign('proprty_id')->references('id')->on('Properties')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
    });
    Schema::table('orders', function (Blueprint $table) {
        $table->foreign('room_id')->references('id')->on('Properties')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
    });
    Schema::table('orders', function (Blueprint $table) {
        $table->foreign('user_id')->references('id')->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
    });
    Schema::table('chat_messages', function (Blueprint $table) {
        $table->foreign('sender_id')->references('id')->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
    });
    Schema::table('chat_messages', function (Blueprint $table) {
        $table->foreign('receiver_id')->references('id')->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
    });

    Schema::table('contact_us', function (Blueprint $table) {
        $table->foreign('user_id')->references('id')->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
    });
    Schema::table('videos', function (Blueprint $table) {
        $table->foreign('property_id')->references('id')->on('Properties')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
    });
    Schema::table('wishlists', function (Blueprint $table) {
        $table->foreign('user_id')->references('id')->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
    });
    Schema::table('wishlists', function (Blueprint $table) {
        $table->foreign('property_id')->references('id')->on('Properties')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
    });
}


	public function down()
	{
		Schema::table('photos', function(Blueprint $table) {
			$table->dropForeign('photos_property_id_foreign');
		});
		Schema::table('Properties', function(Blueprint $table) {
			$table->dropForeign('Properties_user_id_foreign');
		});
		Schema::table('rooms', function(Blueprint $table) {
			$table->dropForeign('rooms_property_id_foreign');
		});
		Schema::table('amenities', function(Blueprint $table) {
			$table->dropForeign('amenities_property_id_foreign');
		});
		Schema::table('property_types', function(Blueprint $table) {
			$table->dropForeign('property_types_property_id_foreign');
		});
		Schema::table('rate_property', function(Blueprint $table) {
			$table->dropForeign('rate_property_user_id_foreign');
		});
		Schema::table('rate_property', function(Blueprint $table) {
			$table->dropForeign('rate_property_proprty_id_foreign');
		});
		Schema::table('orders', function(Blueprint $table) {
			$table->dropForeign('orders_propertiy_id_foreign');
		});
		Schema::table('orders', function(Blueprint $table) {
			$table->dropForeign('orders_user_id_foreign');
		});
		Schema::table('chat_messages', function(Blueprint $table) {
			$table->dropForeign('chat_messages_sender_id_foreign');
		});
		Schema::table('chat_messages', function(Blueprint $table) {
			$table->dropForeign('chat_messages_receiver_id_foreign');
		});

		Schema::table('contact_us', function(Blueprint $table) {
			$table->dropForeign('contact_us_user_id_foreign');
		});
		Schema::table('videos', function(Blueprint $table) {
			$table->dropForeign('videos_property_id_foreign');
		});
		Schema::table('wishlists', function(Blueprint $table) {
			$table->dropForeign('wishlists_user_id_foreign');
		});
		Schema::table('wishlists', function(Blueprint $table) {
			$table->dropForeign('wishlists_property_id_foreign');
		});
	}
}
