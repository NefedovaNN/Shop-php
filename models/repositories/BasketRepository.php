<?php

namespace app\models\repositories;

use app\engine\App;
use app\models\Repository;
use app\models\entities\Basket;

class BasketRepository extends Repository
{
    public function getBasket($session_id)
    {
        $sql = "SELECT basket.id as basket_id, quantity, product_sum, products.id prod_id, products.title, products.image, products.description, products.price FROM `basket`, `products` WHERE `session_id` = :session_id AND basket.product_id = products.id";
        return App::call()->db->queryAll($sql, ['session_id' => $session_id]);
    }
    public function getBasketSum($session_id)
    {
        $basket = App::call()->basketRepository->getBasket($session_id);
        $sum = 0;
        foreach($basket as $item){
            $sum += $item['product_sum'];
        }
        return $sum;

    }
    // public function getCountWhere($session_id)
    // {
    //    $basket = App::call()->BasketRepository->getBasket($session_id);
    //    $quantity = 0;
    //    foreach($basket as $item){
    //     $quantity += $item['quantity'];
    // }
    //     return $quantity;
    // }
    public function getTableName()
    {
        return 'basket';
    }
    public function getEntityClass()
    {
        return Basket::class;
    }
}
