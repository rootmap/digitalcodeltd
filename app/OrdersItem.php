<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersItem extends Model {

    //
    protected $table = "orders_items";

    public function orderItems() {
        return OrdersItem::where('order_id', $this->id)->all();
    }

}
