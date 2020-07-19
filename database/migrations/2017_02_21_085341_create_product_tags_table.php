<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_tags', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('pid')->unsigned;
			$table->integer('tid')->unsigned;
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
		Schema::drop('product_tags');
	}

}
