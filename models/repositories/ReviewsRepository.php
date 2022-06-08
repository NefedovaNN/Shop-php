<?php
namespace app\models\repositories;

use app\engine\App;
use app\models\entities\Reviews;
use app\models\Repository;

class ReviewsRepository extends Repository
{
    public function getReviews($key, $value)
    {
        $sql  = "SELECT*FROM `reviews` WHERE {$key} = :value";
        return App::call()->db->queryAll($sql, ['value' => $value]);
    }
    public function getTableName(){
        return 'reviews';
    }
    public function getEntityClass()
    {
        return Reviews::class;
    }
}