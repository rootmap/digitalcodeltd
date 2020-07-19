<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->string('pcode');
                        $table->string('name');
                        $table->unsignedinteger('quantity');
                        $table->string('price');
                        $table->string('old_price');
                        $table->integer('cid')->unsigned;
                        $table->integer('scid')->unsigned;
                        $table->integer('tid')->unsigned;
                        $table->integer('bid')->unsigned;
                        $table->text('photo');
                        $table->text('description');
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
		Schema::drop('products');
	}

}
