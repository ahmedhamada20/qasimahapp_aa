<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsedCouponsTable extends Migration {

	public function up()
	{
		Schema::create('used_coupons', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('user_id')->unsigned();
			$table->integer('item_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('used_coupons');
	}
}