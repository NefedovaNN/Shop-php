<?php
namespace app\models\repositories;

use app\engine\App;
use app\models\entities\Orders;
use app\models\Repository;

class OrdersRepository extends Repository
{
    public function getOrders($numberPhone)
    {
        $sql = "SELECT * FROM `orders` WHERE numberPhone = :numberPhone";
        return App::call()->db->queryAll($sql, ['numberPhone' => $numberPhone]);
    }
    public function getTableName(){
        return 'orders';
    }
    public function getEntityClass()
    {
        return Orders::class;
    }
}