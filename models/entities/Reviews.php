<?php
namespace app\models\entities;
use app\models\Model;
class Reviews extends Model
{
    protected $id;
    protected $name;
    protected $feedback;
    protected $login;
    protected $props =[
        'name' => false,
        'feedback' => false,
        'login' => false
    ];
    public function __construct($name = null, $feedback = null, $login = null)
    {
        $this->name = $name;
        $this->feedback = $feedback;
        $this->login = $login;
    }
  
}