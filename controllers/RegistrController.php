<?php 
namespace app\controllers;

use app\engine\App;
use app\models\entities\User;

class RegistrController extends Controller
{
    public function actionIndex() 
    {
        echo $this->render('registr');
    }
    
    public function actionSignUp()
    {
        $login = App::call()->request->getParams()['login'];
        $numberPhone = App::call()->request->getParams()['numberPhone'];
        $pass = App::call()->request->getParams()['pass'];
        $passConfirm = App::call()->request->getParams()['pass_confirm'];
        $firstName = App::call()->request->getParams()['firstName'];
        $lastName = App::call()->request->getParams()['lastName'];
        $email= App::call()->request->getParams()['email'];
        $city = App::call()->request->getParams()['city'];
       
        if($login && $numberPhone && $pass && $passConfirm && $firstName && $lastName && $email && $city){
            if ($pass === $passConfirm){

                $userlogin = App::call()->userRepository->getWhere('login', $login);
                $userPhone = App::call()->userRepository->getWhere('numberPhone', $numberPhone);
                $userEmail = App::call()->userRepository->getWhere('email', $email);
                
                if(!$userlogin && !$userPhone && !$email){
                    $hash = password_hash($pass, PASSWORD_DEFAULT);
                    $user = new User($login, $pass, $hash, $numberPhone, $firstName, $lastName, $email, $city);
                    App::call()->userRepository->save($user);  
                    App::call()->session->set('message', 'Вы успешно зарегистрированы! Авторизуйтесь!');
                    header("Location: /auth");
                    die();
                } else {
                    App::call()->session->set('message', 'Пользователь с такими данными уже есть! Введите новые данные!');
                    header("Location: /registr");
                    die();
                   
                }
            } else {
                App::call()->session->set('message', 'Пароли не совпадают');
                header("Location: /registr");
                die();
            }

        } else {
            App::call()->session->set('message', 'Не все поля заполнены!');
            header("Location: /registr");
            die();
        }
        

    }

}