<?php

namespace app\controllers;

use app\engine\App;
use app\models\entities\Orders;


class OrdersController extends Controller
{
  protected function actionIndex()
  {
    $login = App::call()->userRepository->getLogin();
    if ($login) {
      $user = App::call()->userRepository->getWhere('login', $login);
      $numberPhone = $user->numberPhone;
    } else {
      $numberPhone = App::call()->request->getParams()['numberPhone'];
    }

    $orders = App::call()->ordersRepository->getOrders($numberPhone);

    echo  $this->render('orders/orders', [
      'orders' => $orders,
      'isAuth' => App::call()->userRepository->isAuth(),
      'message' => App::call()->session->get('message'),
      'unsetMessage' => App::call()->session->unset('message')
    ]);
  }
  protected function actionOrderDetails()
  {
    $id = App::call()->request->getParams()['id'];
    $order = App::call()->ordersRepository->getOne($id);
    $session_id = $order->session_id;
    $basket = App::call()->basketRepository->getBasket($session_id);
    echo $this->render('orders/orderDetails', [
      'basket' => $basket,
      'sum' => App::call()->basketRepository->getBasketSum($session_id),
      'message' => App::call()->session->get('message'),
      'unsetMessage' => App::call()->session->unset('message')
    ]);
  }

  public function actionCheckoutInfo()
  {
    $session_id = App::call()->session->getId();
    $login = App::call()->userRepository->getLogin();
    $user = App::call()->userRepository->getWhere('login', $login);
    $sum = App::call()->basketRepository->getBasketSum( $session_id);
    
    echo $this->render('orders/checkoutInfo', [
      'user' => $user,
      'sum' => $sum,
      'message' => App::call()->session->get('message'),
      'unsetMessage' => App::call()->session->unset('message')
    ]);
  }
  public function actionOrderConfirm()
  {
    $session_id = App::call()->session->getId();
    $login = App::call()->request->getParams()['login'];
    $email = App::call()->request->getParams()['email'];
    $numberPhone = App::call()->request->getParams()['numberPhone'];
    $city = App::call()->request->getParams()['city'];
    $firstName = App::call()->request->getParams()['firstName'];
    $sum = App::call()->request->getParams()['sum'];

    if ($email && $numberPhone && $city && !is_null($sum)) {
      $order = new Orders($session_id, $login, $firstName, $email, $numberPhone, $city, $sum);
      App::call()->ordersRepository->save($order);
      App::call()->session->set('message', 'Заказ оформлен!');
      App::call()->session->regenerate();
      if ($login) {

        header("location: /orders");
      } else {
        header("Location: /orders/index/?numberPhone={$numberPhone}");
      }
    } else {
      App::call()->session->set('message', 'Не все поля заполнены!');
      header('Location: /orders/checkoutInfo');
      die();
    }
  }
}
