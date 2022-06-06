<?php
namespace app\models\repositories;

use app\engine\App;
use app\models\entities\Orders;
use app\models\Repository;

class OrdersRepository extends Repository
{
    public function getOrders($value)
    {
        $sql = "SELECT * FROM `orders` WHERE numberPhone = :value";
        return App::call()->db->queryAll($sql, ['value' => $value]);
    }
    public function getTableName(){
        return 'orders';
    }
    public function getEntityClass()
    {
        return Orders::class;
    }
}