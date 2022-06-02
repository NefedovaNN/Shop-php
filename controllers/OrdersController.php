<?php
namespace app\controllers;

use app\engine\App;
use app\models\entities\Orders;

class OrdersController extends Controller
{
    protected function actionIndex()
    {
      $numberPhone = App::call()->request->getParams()['numberPhone'];
      $orders = App::call()->ordersRepository->getOrders($numberPhone);
      echo  $this->render('orders/orders', [
        'orders' => $orders
      ]);
    }
    protected function actionOrderDetails()
    {
      $id = App::call()->request->getParams()['id'];
      $order = App::call()->ordersRepository->getOne($id);
      $session_id = $order->session_id;
      $basket = App::call()->basketRepository->getBasket($session_id);
      echo $this->render('orders/orderDetails', [
        'basket' => $basket
      ]);
    }
    protected function actionCheckout()
    {
      $session_id = App::call()->session->getId();
      $sum = App::call()->basketRepository->getSum('session_id', $session_id);
      $numberPhone = App::call()->request->getParams()['numberPhone'];
     if($numberPhone || !is_null($sum))
     {
      $orders = new Orders($session_id, $numberPhone, $sum);
      App::call()->ordersRepository->save($orders);
      App::call()->session->regenerate();
      header("Location: /orders/index/?numberPhone={$numberPhone}");
      die();
       
     } else {
       die('Неправильно введен номер телефона или ваша корзина пуста');
     }
      
    }
    
  
}