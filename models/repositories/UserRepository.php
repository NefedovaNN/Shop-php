<?php 
namespace app\models\repositories;

use app\engine\App;
use app\models\entities\User;
use app\models\Repository;

class UserRepository extends Repository
{
    public function getTableName(){
        return 'users';
    }
    public function getEntityClass()
    {
        return User::class;
    }
  
     public function Auth($login, $password) {
        $user = $this->getWhere('login', $login);
        if($user !== false && password_verify($password, $user->hash)){
            App::call()->session->set('login', $login);
            App::call()->session->set('id', $user->id);
            return true;
        }
        return false;
    }
    public function is_Admin()
    {
        return App::call()->session->get('login') === 'admin';
    }
    public function isAuth() {

        return null !== App::call()->session->get('login');
        
    }
    public function getLogin() {

        return App::call()->session->get('login');
    }
    public function getName() {
        $login = App::call()->session->get('login');
        $user = $this->getWhere('login', $login);
        return $user->firstName;
    }
}