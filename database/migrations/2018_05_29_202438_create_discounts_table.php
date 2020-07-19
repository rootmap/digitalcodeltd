<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('minimum_amount')->nullable()->default('0');
            $table->string('discount_option',
                    array('Common','Order Online','Delivery','Collection'))
                    ->nullable()
                    ->default('Common');
            $table->enum('discount_type',array('Fixed','Percentage'))->nullable()->default('Fixed');
            $table->float('discount_amount')->nullable()->default('0');
            $table->string('message')->nullable();
            $table->enum('discount_status',
                    array('Active','Inactive'))
                  ->nullable()
                  ->default('Active');
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
        Schema::dropIfExists('discounts');
    }
}
