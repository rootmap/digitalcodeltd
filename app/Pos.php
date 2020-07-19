<?php

namespace App;

class Pos {

    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart) {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $id) {
        $storeditem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storeditem = $this->items[$id];
            }
        }
        $storeditem['qty'] ++;
        $storeditem['price'] = $item->price * $storeditem['qty'];
        $this->items[$id] = $storeditem;
        $this->totalQty++;
        $this->totalPrice += $item->price;
    }
    
    

    public function delProduct($item, $id) {
        
        $storeditem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storeditem = $this->items[$id];
            }
        }
        $storeditem['qty'] += -1;
        $storeditem['price'] = $item->price * $storeditem['qty'];
        $this->items[$id] = $storeditem;
        $this->totalQty += -1;
        $this->totalPrice += -($item->price);
        
        if($storeditem['qty']==0)
        {
            unset($this->items[$id]);
        }
        
    }

    public function delEntireProduct($item, $id) {

        //echo $id;
        //print_r($item);
        $deduct_price = 0;
        $deduct_qty = 0;
        foreach ($this->items as $itm):
            if ($itm['item']->id == $id) {
                $deduct_price += $itm['price'];
                $deduct_qty += $itm['qty'];
            }
        endforeach;

        $newTotalPrice = $this->totalPrice - $deduct_price;
        $newTotalQty = $this->totalQty - $deduct_qty;

        $this->totalPrice = $newTotalPrice;
        $this->totalQty = $newTotalQty;

        unset($this->items[$id]);        
    }

    public function delProductRow($item, $id) {
        if ($this->items) {
            $this->totalQty = $this->totalQty - $this->items[$id]['qty'];
            $this->totalPrice = $this->totalPrice - $this->items[$id]['price'];
            unset($this->items[$id]);
        }
    }

    public function ClearCart() {
        $storeditem = ['qty' => 0, 'price' => 0, 'item' => 0];
        $this->items = null;
        $this->totalQty = 0;
        $this->totalPrice = 0;
    }

}
