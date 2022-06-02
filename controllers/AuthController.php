<?php

namespace app\controllers;

use app\engine\App;
use app\engine\Session;
use app\models\entities\User;

class AuthController extends Controller
{
    public function actionAuthorization() 
    {
        echo $this->render('auth');
    }
    public function actionRegistration() 
    {
        echo $this->render('registr');
    }
    public function actionSignUp()
    {
        $login = App::call()->request->getParams()['login'];
        $numberPhone = App::call()->request->getParams()['numberPhone'];
        $pass = App::call()->request->getParams()['pass'];
        $passConfirm = App::call()->request->getParams()['pass_confirm'];
       
        if($login && $numberPhone && $pass && $passConfirm){
            if ($pass === $passConfirm){

                $userlogin = App::call()->userRepository->getWhere('login', $login);
                $userPhone = App::call()->userRepository->getWhere('numberPhone', $numberPhone);
                
                if(!$userlogin && !$userPhone){
                    $hash = password_hash($pass, PASSWORD_DEFAULT);
                    $user = new User($login, $pass, $hash, $numberPhone);
                    App::call()->userRepository->save($user);  
                    App::call()->session->set('message', 'Вы успешно зарегистрированы! Авторизуйтесь!');
                    header("Location: /auth/authorization");
                    die();
                } else {
                    App::call()->session->set('message', 'Пользователь с такими данными уже есть! Введите новые данные!');
                    header("Location: /auth/registration");
                    die();
                   
                }
            } else {
                App::call()->session->set('message', 'Пароли не совпадают');
                header("Location: /auth/registration");
                die();
            }

        } else {
            App::call()->session->set('message', 'Не все поля заполнены!');
            header("Location: /auth/registration");
            die();
        }
        

    }
   
    //action="/auth/login"
    public function actionLogin() {
        $login = App::call()->request->getParams()['login'];
        $password = App::call()->request->getParams()['password'];
        if (App::call()->userRepository->Auth($login, $password)){
            header("Location: /");
            die();
        } else
        {
            App::call()->session->set('message', 'Неверный логин или пароль!');
            header("Location: /auth/authorization");
            die();
          
        }
    }

    public function actionLogout()
    {
        App::call()->session->regenerate();
        App::call()->session->regenerate();
        App::call()->session->destroy();
        header("Location: /");
        die();
    }
}