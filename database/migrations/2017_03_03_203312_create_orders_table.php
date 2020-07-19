<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->string('tracking');
                        $table->string('cart');
                        $table->integer('cid')->unsigned;
                        $table->date('invoice_date');
                        $table->date('due_date');
                        $table->enum('order_status',array('Pending','Paid','Cancel'));
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
		Schema::drop('orders');
	}

}
