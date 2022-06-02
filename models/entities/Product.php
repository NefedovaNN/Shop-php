<?php
namespace app\models\entities;
use app\models\Model;
class Product extends Model
{
    protected $id;
    protected $image;
    protected $title;
    protected $description;
    protected $price;
    
    protected $props = [
        'image' => false,
        'title' => false,
        'description' => false,
        'price' => false
    ];
    public function __construct($image = null, $title = null, $description = null, $price = null)
    {
        $this->image = $image;
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
    }
   
}