<?php

namespace app\controllers;

use app\engine\App;
use app\models\entities\Reviews;

class ReviewsController extends Controller
{
  protected function actionIndex()
  {
    $feedbacks = App::call()->reviewsRepository->getAll();
    echo  $this->render('reviews', [
      'feedbacks' => $feedbacks,
      'isAdmin' => App::call()->userRepository->is_Admin(),
      'isAuth' => App::call()->userRepository->isAuth()
    ]);
  }
  protected function actionAdd()
  {
    $id = App::call()->request->getParams()['id'];
    $name = App::call()->request->getParams()['name'];
    $feedback = App::call()->request->getParams()['feedback'];

    if ($id) {
      $reviews = App::call()->reviewsRepository->getOne($id);
      $reviews->name = $name;
      $reviews->feedback = $feedback;
    } else {
      $reviews = new Reviews($name, $feedback);
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
