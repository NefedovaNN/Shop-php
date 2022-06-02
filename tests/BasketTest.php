<?php

use app\models\entities\Basket;
use PHPUnit\Framework\TestCase;

class BasketTest extends TestCase
{
    public function testBasketConstructor()
    {
        $session_id = 'kgkgbig872bjk';
        $product_id = '12';
        $basket = new Basket($session_id,$product_id);
        $this->assertEquals($session_id, $basket->session_id);
        $this->assertEquals($product_id, $basket->product_id);
    }
}