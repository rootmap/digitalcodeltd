<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model {

    protected $table = "sliders";
    public function getProducts()
    {
        return $this->belongsTo('App\Product');
    }

}
