<?php

use app\models\entities\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testProductConstructor()
    {
        $image = '17.jpg';
        $title = 'Shoose';
        $description = 'guhkshld';
        $price = '52';
        $product = new Product($image, $title, $description, $price);
        $this->assertEquals($image, $product->image);
        $this->assertEquals($title, $product->title);
        $this->assertEquals($description, $product->description);
        $this->assertEquals($price, $product->price);

    }

}