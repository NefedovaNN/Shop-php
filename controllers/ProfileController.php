<?php

namespace app\controllers;

use app\engine\App;

class ProfileController extends Controller
{
    public function actionIndex()
    {
        $login = App::call()->userRepository->getLogin();
        $profile = App::call()->userRepository->getWhere('login', $login);

        echo $this->render('profile', [
            'profile' => $profile,
            'isAuth' => App::call()->userRepository->isAuth(),
            'message' => App::call()->session->get('message'),
            'unsetMessage' => App::call()->session->unset('message')
            
        ]);
    }
    public function actionChange()
    {
        $id = App::call()->request->getParams()['id'];
        
        $firstName = App::call()->request->getParams()['firstName'];
        $lastName = App::call()->request->getParams()['lastName'];
        $email = App::call()->request->getParams()['email'];
        $city = App::call()->request->getParams()['city'];

       
        $userEmail = App::call()->userRepository->getWhere('email', $email);
        
        if(!$userEmail | $userEmail->id == $id)
        {
         
            $profile = App::call()->userRepository->getOne($id);
            $profile->firstname = $firstName;
            $profile->lastName = $lastName;
            $profile->email = $email;
            $profile->city = $city;
            App::call()->userRepository->save($profile);
            App::call()->session->set('message', 'Ваши данные успешно изменены!') ;
            header("Location: /profile");
            die();
            
            
        } else {
            App::call()->session->set('message', 'Пользователь с такими данными уже есть!' ) ;
            header("Location: /profile");
            die();
        }
    }
}
