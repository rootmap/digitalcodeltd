<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shipping', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->string('name');
                        $table->text('shippingimage');
                        $table->text('description');
                        $table->string('price');
                        $table->boolean('isactive');
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
		Schema::drop('shipping');
	}

}
