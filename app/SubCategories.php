<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

/**
 * Description of SubCategories
 *
 * @author fahad
 */
class SubCategories extends Eloquent {
    //put your code here
    public function subcate()
    {
        return SubCategory::where('category_id', $this->id)->all();
    }
}
