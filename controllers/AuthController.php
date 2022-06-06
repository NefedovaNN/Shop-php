<?php

namespace app\controllers;

use app\engine\App;


class AuthController extends Controller
{
    public function actionIndex() 
    {
        echo $this->render('auth', [
            'message' => App::call()->session->get('message'),
            'unsetMessage' => App::call()->session->unset('message')
        ]);
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
            
            header("Location: /auth");
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