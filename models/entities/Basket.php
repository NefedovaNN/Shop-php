<?php

namespace app\models\entities;
use app\models\Model;


class Basket extends Model
{
    protected $id;
    protected $product_id;
    protected $session_id;
    protected $quantity;
    protected $product_sum;
    protected $props = [
        'product_id' => false,
        'session_id' => false,
        'quantity' => false,
        'product_sum' => false

    ];
    public function __construct( $session_id = null, $product_id = null, $quantity = 1, $product_sum = null)
    {
        $this->session_id = $session_id;
        $this->product_id = $product_id;
        $this->quantity = $quantity;
        $this->product_sum = $product_sum;
    }
   
}
