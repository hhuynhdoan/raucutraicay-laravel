<?php
    namespace App;

    class Cart{

        public $items = null;
        public $totalQty = 0;
        public $totalPrice = 0;


        public function __construct($oldCart){
            
            if($oldCart){
                $this->items = $oldCart->items;
                $this->totalQty = $oldCart->totalQty;
                $this->totalPrice = $oldCart->totalPrice;
            }

        }

        public function add($item, $product_id){

            $storedItem = ['qty' => 0, 'product_id' => 0, 'ten_sp' => $item->ten_sp,
        'gia_sp' => $item->gia_sp, 'anh_sp' => $item->anh_sp, 'item' =>$item];

        if($this->items){
            if(array_key_exists($product_id, $this->items)){
                $storedItem = $this->items[$product_id];
            }
        }

        $storedItem['qty']++;
        $storedItem['product_id'] = $product_id;
        $storedItem['ten_sp'] = $item->ten_sp;
        $storedItem['gia_sp'] = $item->gia_sp;
        $storedItem['anh_sp'] = $item->anh_sp;
        $this->totalQty++;
        $this->totalPrice += $item->gia_sp;
        $this->items[$product_id] = $storedItem;

        }

        public function updateqty($id, $qty){
            $this->totalQty -= $this->items[$id]['qty'];
            $this->totalPrice -= $this->items[$id]['gia_sp'] * $this->items[$id]['qty'];
            $this->items[$id]['qty'] = $qty;
            $this->totalQty += $qty;
            $this->totalPrice += $this->items[$id]['gia_sp'] * $qty;

        }

        public function removeItem($id){
            $this->totalQty -= $this->items[$id]['qty'];
            $this->totalPrice -= $this->items[$id]['gia_sp'] * $this->items[$id]['qty'];
            unset($this->items[$id]);
        }


    }
?>