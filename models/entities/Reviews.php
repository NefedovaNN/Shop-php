<?php
namespace app\models\entities;
use app\models\Model;
class Reviews extends Model
{
    protected $id;
    protected $name;
    protected $feedback;
    protected $props =[
        'name' => false,
        'feedback' => false
    ];
    public function __construct($name = null, $feedback = null)
    {
        $this->name = $name;
        $this->feedback = $feedback;
    }
  
}