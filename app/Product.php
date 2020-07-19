<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    //
    protected $table = "products";

    public function GetSlider() {
        return $this->hasMany('App\Slider');
    }

    public function Getreviews() {
        return $this->hasMany('App\Review');
    }

}
