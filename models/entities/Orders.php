<?php
namespace app\models\entities;
use app\models\Model;

class Orders extends Model
{
    protected $id;
    protected $session_id;
    protected $login;
    protected $firstName;
    protected $email;
    protected $numberPhone;
    protected $city;
    protected $sum;
    protected $status;
    protected $props = [
        'session_id' => false,
        'login'  => false,
        'firstName' => false,
        'email' => false,
        'numberPhone' => false,
        'city' => false,
        'sum' => false,
        'status' => false
    ];
    public function __construct($session_id = null, $login = null, $firstName = null, $email = null, $numberPhone = null, $city = null,$sum = null, $status = 'Заказ оформлен')
    {
        $this->session_id = $session_id;
        $this->login = $login;
        $this->firstName = $firstName;
        $this->email = $email;
        $this->numberPhone = $numberPhone;
        $this->city = $city;
        $this->sum = $sum;
        $this->status = $status;
    }
   
}