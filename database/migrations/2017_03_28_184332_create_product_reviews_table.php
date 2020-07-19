<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductReviewsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_reviews', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('product_id');
			$table->foreign('product_id')->references('id')->on('products');
			$table->integer('rating');
			$table->string('title');
			$table->text('comment');
			$table->text('customer_name');
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
		Schema::drop('product_reviews');
	}

}
