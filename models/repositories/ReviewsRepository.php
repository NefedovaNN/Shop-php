<?php
namespace app\models\repositories;
use app\models\entities\Reviews;
use app\models\Repository;

class ReviewsRepository extends Repository
{
    public function getReviews()
    {
        return [];
    }
    public function getTableName(){
        return 'reviews';
    }
    public function getEntityClass()
    {
        return Reviews::class;
    }
}