<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders_items', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->integer('order_id');
                        $table->string('tracking');
                        $table->integer('pid')->unsigned;
                        $table->float('quantity');
                        $table->float('unit_price');
                        $table->string('tax_rate');
                        $table->float('tax_amount');
                        $table->float('row_total');
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
		Schema::drop('orders_items');
	}

}
