<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sliders', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->integer('product_id');
                        $table->foreign('product_id')->references('id')->on('products');
                        $table->string('name');
                        $table->text('sliderimage');
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
		Schema::drop('sliders');
	}

}
