<?php



namespace App;



use Illuminate\Database\Eloquent\Model;



class Orders extends Model {



    protected $table = "orders";



    public function orderItem() {

        return $this->hasMany('App\OrdersItem','order_id');

    }

    public function scopeCustomerOrder($query, $cid)
    {
        return $query->where('cid', $cid);
    }



}

