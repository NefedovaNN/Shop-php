<?php
namespace app\controllers;

use app\engine\App;

class ProfileController extends Controller 
{
    public function actionIndex()
    {
        $login = App::call()->userRepository->getName();
        $profile = App::call()->userRepository->getWhere('login', $login);
      
        echo $this->render('profile', [
            'profile' => $profile,
            'isAuth' => App::call()->userRepository->isAuth()
        ]);
    }
}