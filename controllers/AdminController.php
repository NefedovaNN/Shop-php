<?php

namespace app\controllers;

use app\engine\App;

class AdminController extends Controller
{


    public function actionIndex()
    {
        if (App::call()->userRepository->is_Admin()) {
            $orders = App::call()->ordersRepository->getAll();
            echo $this->render('admin/admin', [
                'orders' => $orders
            ]);
        } else {
            echo 'У вас нет прав администратора';
        }
    }
    public function actionGetOrder()
    {
        if (App::call()->userRepository->is_Admin()) {
            $id = App::call()->request->getParams()['id'];
            $order = App::call()->ordersRepository->getOne($id);
            $session_id = $order->session_id;
            $basket = App::call()->basketRepository->getBasket($session_id);

            echo $this->render('admin/getOrder', [
                'basket' => $basket
            ]);
        } else {
            echo 'У вас нет прав администратора';
        }
    }
    public function actionChangeStatus()
    {
        if (App::call()->userRepository->is_Admin()) {
            $id = App::call()->request->getParams()['id'];
            $status = App::call()->request->getParams()['status'];
            $orders = App::call()->ordersRepository->getOne($id);
            $orders->status = $status;
            App::call()->ordersRepository->save($orders);
            header("Location: /admin");
        } else {
            echo 'У вас нет прав администратора';
        }
    }
}
