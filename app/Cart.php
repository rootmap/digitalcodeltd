<?php

namespace App;

class Cart {

    public $items = null;
    public $deliveryDetail = null;
    public $rec = "Delivery";
    public $orderID = 0;
    public $userID = 0;
    public $totalQty = 0;
    public $totalPrice = 0;
    //public $delivery_cost = 0;
    public $delivery_cost = 0;

    public function __construct($oldCart) {
        if ($oldCart) {
            $this->items = $oldCart->items;
            if(empty($oldCart->rec))
            {
                $this->rec = "Delivery";
                $this->delivery_cost = 1.5;
            }
            else
            {
                $this->rec = $oldCart->rec;
            }

            $this->delivery_cost = $oldCart->delivery_cost;
            $this->deliveryDetail = $oldCart->deliveryDetail;
            $this->orderID = $oldCart->orderID;
            $this->userID = $oldCart->userID;
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

    public function addINM($item, $id,$inMPrice,$prName,$inMealDetail) {
        $kid=md5($prName.''.$inMealDetail);
        $inMealDetailArray=explode(',',$inMealDetail);
        $storeditem = ['data'=>$item,'qty' => 0,'inclusiveMeal'=>1, 'price' => $inMPrice, 'unit_price' => $inMPrice, 'item' => $prName,'flavour'=> $inMealDetailArray,'raw_flavour'=> $prName.'-'. $inMealDetail];
        if ($this->items) {
            if (array_key_exists($kid, $this->items)) {
                $storeditem = $this->items[$kid];
            }
        }

        $storeditem['qty'] ++;
        $storeditem['price'] = $inMPrice * $storeditem['qty'];
        $this->items[$kid] = $storeditem;
        $this->totalQty++;
        $this->totalPrice += $inMPrice;
    }

    public function addSingleSubcat($item, $id,$sub_cat_name) {
        $storeditem = ['qty' => 0,'sub_cat_name'=>$sub_cat_name, 'price' => $item->price, 'item' => $item];
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

    public function addRec($rec='') {
        $this->rec = $rec;
    }    

    public function mergeDeliveryCost($dd=0) {
        if($this->rec=="Delivery")
        {
            $this->delivery_cost = $dd;
        }
        else
        {
            $this->delivery_cost = 0;
        }
        
    }

    public function storeDelivery($name,$phone,$address,$email,$zipcode,$asap,$delivery_date,$delivery_time,$delivery_note) {
        if(empty($this->orderID))
        {
            $this->orderID=time();
        }

        $this->userID=\Auth::user()->id;

        $this->deliveryDetail=['name'=>$name,
                                'phone'=>$phone,
                                'address'=>$address,
                                'email'=>$email,
                                'zipcode'=>$zipcode,
                                'asap'=>$asap,
                                'delivery_date'=>$delivery_date,
                                'delivery_time'=>$delivery_time,
                                'delivery_note'=>$delivery_note
                              ];
    }

    public function addSnd($item, $id,$snd_item,$snd_id) {
        $storeditem = ['qty' => 0, 'price' => $snd_item->price, 'item' => $item, 'snd_item' =>array()];
        $storeSNDItem=['qty' => 0, 'price' => $snd_item->price, 'item' => $snd_item];

        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storeditem = $this->items[$id];
            }
        }

        if ($storeditem['snd_item']) {
            if (array_key_exists($snd_id, $storeditem['snd_item'])) {
                $storeSNDItem = $storeditem['snd_item'][$snd_id];

            }
        }

        $storeSNDItem['qty']++;
        $storeSNDItem['price'] = $snd_item->price * $storeSNDItem['qty'];
        
        $storeditem['qty']++;
        if($storeditem['qty']>1)
        {
            $storeditem['price']+=$snd_item->price;
        }

        $storeditem['snd_item'][$snd_id]=$storeSNDItem;

        $this->items[$id] = $storeditem;
        $this->totalQty++;
        $this->totalPrice += $snd_item->price;
    }

    public function addSndSubCat($item, $id,$snd_item,$snd_id,$sub_cat_name) {
        $storeditem = ['qty' => 0, 'price' => $snd_item->price,'sub_cat_name'=>$sub_cat_name, 'item' => $item, 'snd_item' =>array()];
        $storeSNDItem=['qty' => 0, 'price' => $snd_item->price,'sub_cat_name'=>$sub_cat_name, 'item' => $snd_item];

        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storeditem = $this->items[$id];
            }
        }

        if ($storeditem['snd_item']) {
            if (array_key_exists($snd_id, $storeditem['snd_item'])) {
                $storeSNDItem = $storeditem['snd_item'][$snd_id];

            }
        }

        $storeSNDItem['qty']++;
        $storeSNDItem['price'] = $snd_item->price * $storeSNDItem['qty'];
        
        $storeditem['qty']++;
        if($storeditem['qty']>1)
        {
            $storeditem['price']+=$snd_item->price;
        }

        $storeditem['snd_item'][$snd_id]=$storeSNDItem;

        $this->items[$id] = $storeditem;
        $this->totalQty++;
        $this->totalPrice += $snd_item->price;
    }

    public function addexecMenu($item, $id,$execArrayData) {
        $storeditem = ['qty' => 0, 'price' => $item->price, 'item' => $item, 'exec_menu' => 1, 'execArrayData' => $execArrayData];
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

    public function addPizzaMenu($item, $id,$size='',$flabour='',$extra='') {
        $storeditem = ['qty' => 0, 'price' => $item->price, 'item' => $item, 'pizza_menu' => 1, 
        'size' => $size,
        'flabour' => $flabour,
        'extra' => $extra
                        ];
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

    public function delProductFullRemove($id) {
        $storeditem = ['qty' => 0, 'price' =>0];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storeditem = $this->items[$id];
            }
        }

        $this->totalQty += -$storeditem['qty'];
        $this->totalPrice += -$storeditem['price'];
        
        unset($this->items[$id]);
        
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
        $this->rec = null;
        $this->totalQty = 0;
        $this->totalPrice = 0;
    }

}
