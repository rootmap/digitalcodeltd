<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model {

    protected $table="sub_categories";
    public function cat()
    {
        return $this->belongsTo('App\category');
    }

}
