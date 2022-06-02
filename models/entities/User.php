<?php
namespace app\models\entities;
use app\models\Model;
class User extends Model
{
    protected $id;
    protected $login;
    protected $password;
    protected $hash;
    protected $numberPhone;
    protected $props = [
        'login' => false,
        'password' => false,
        'hash' => false,
        'numberPhone' => false
    ];
    
    public function __construct($login = null, $password = null, $hash = null, $numberPhone = null)
    {
       $this->login = $login;
       $this->password = $password;
       $this->hash = $hash;
       $this->numberPhone = $numberPhone;
    }
    

}