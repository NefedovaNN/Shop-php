<?php
namespace app\models\entities;
use app\models\Model;

class Orders extends Model
{
    protected $id;
    protected $session_id;
    protected $numberPhone;
    protected $sum;
    protected $status;
    protected $props = [
        'session_id' => false,
        'numberPhone' => false,
        'sum' => false,
        'status' => false
    ];
    public function __construct($session_id = null, $numberPhone = null, $sum = null, $status = 'Заказ оформлен')
    {
        $this->session_id = $session_id;
        $this->numberPhone = $numberPhone;
        $this->sum = $sum;
        $this->status = $status;
    }
   
}