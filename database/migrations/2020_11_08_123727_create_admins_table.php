<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdminsTable extends Migration {

	public function up()
	{
		Schema::create('admins', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('email', 191)->nullable();
			$table->string('name', 191)->nullable();
			$table->string('password', 191)->nullable();
		});
	}

	public function down()
	{
		Schema::drop('admins');
	}
}