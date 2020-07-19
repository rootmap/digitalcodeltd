<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contact_details', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('contact_title');
			$table->string('contact_address');
			$table->string('contact_phone');
			$table->string('contact_email');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contact_details');
	}

}
