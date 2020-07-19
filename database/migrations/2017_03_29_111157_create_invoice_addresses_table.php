<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceAddressesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invoice_addresses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('company');
			$table->text('address');
			$table->text('address_2');
			$table->string('city');
			$table->integer('state');
			$table->string('zip_code');
			$table->integer('country');
			$table->string('additional_info');
			$table->string('home_phone');
			$table->string('mobile_phone');
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
		Schema::drop('invoice_addresses');
	}

}
