<?php

namespace app\controllers;

use app\engine\App;
use app\models\entities\Reviews;

class ReviewsController extends Controller
{
  protected function actionIndex()
  {
    $feedbacks = App::call()->reviewsRepository->getAll();
    $login = App::call()->userRepository->getLogin();
    $myFeedback = App::call()->reviewsRepository->getReviews('login', $login);
   
    echo  $this->render('reviews', [
      'feedbacks' => $feedbacks,
      'myFeedback' => $myFeedback,
      'isAdmin' => App::call()->userRepository->is_Admin(),
      'isAuth' => App::call()->userRepository->isAuth(),
      'name' => App::call()->userRepository->getName(),
      'message' => App::call()->session->get('message'),
      'unsetMessage' => App::call()->session->unset('message')
    ]);
  }
  protected function actionAdd()
  {
    $id = App::call()->request->getParams()['id'];
    $name = App::call()->request->getParams()['name'];
    $feedback = App::call()->request->getParams()['feedback'];
    $login = App::call()->userRepository->getLogin();

    if ($id) {
      $reviews = App::call()->reviewsRepository->getOne($id);
      $reviews->name = $name;
      $reviews->feedback = $feedback;
      $reviews->login = $login;
      App::call()->session->set('message', 'Изменено');
    } else {
      $reviews = new Reviews($name, $feedback, $login);
      App::call()->session->set('message', 'Ваш отзыв добавлен');
    }
    App::call()->reviewsRepository->save($reviews);
    header("Location: /reviews");
    die();
  }

  protected function actionDelete()
  {
    $id = App::call()->request->getParams()['id'];
    $feedback = App::call()->reviewsRepository->getOne($id);
    $error = 'ok';
    if (!$feedback) {
      $error = 'error1';
    } else {
      App::call()->reviewsRepository->delete($feedback);
    }

    $response = [
      'status' => $error
    ];
    echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    die();
  }
}
