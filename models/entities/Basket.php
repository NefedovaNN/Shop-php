<?php

namespace app\models\entities;
use app\models\Model;


class Basket extends Model
{
    protected $id;
    protected $product_id;
    protected $session_id;
    protected $quantity;
    protected $props = [
        'product_id' => false,
        'session_id' => false,
        'quantity' => false

    ];
    public function __construct( $session_id = null, $product_id = null, $quantity = 1)
    {
        $this->session_id = $session_id;
        $this->product_id = $product_id;
        $this->quantity = $quantity;
    }
   
}
