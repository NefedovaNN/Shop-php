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
    protected $firstName;
    protected $lastName;
    protected $email;
    protected $city;
    protected $props = [
        'login' => false,
        'password' => false,
        'hash' => false,
        'numberPhone' => false,
        'firstName' => false,
        'lastName' => false,
        'email' => false,
        'city' => false
    ];
    
    public function __construct($login = null, $password = null, $hash = null, $numberPhone = null, $firstName = null, $lastName = null, $email = null, $city = null )
    {
       $this->login = $login;
       $this->password = $password;
       $this->hash = $hash;
       $this->numberPhone = $numberPhone;
       $this->firstName = $firstName;
       $this->lastName = $lastName;
       $this->email = $email;
       $this->city = $city;
    }
    

}