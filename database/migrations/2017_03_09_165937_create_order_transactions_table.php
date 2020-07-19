<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_transactions', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->integer('order_id')->unsigned;
                        $table->integer('pm')->unsigned;
                        $table->float('amount');
                        $table->enum('status',array('Completed','Failed'));
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
		Schema::drop('order_transactions');
	}

}
