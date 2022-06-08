<?php

namespace app\controllers;

use app\engine\App;
use app\models\entities\Basket;


class BasketController extends Controller
{
    
    public function actionIndex()
    {
        $session_id = App::call()->session->getId();
        $basket = App::call()->basketRepository->getBasket($session_id);
       
        echo $this->render('basket', [
            'basket' => $basket
        ]);
    }
    public function actionAdd()
    {
        $id = App::call()->request->getParams()['id'];
        $session_id = App::call()->session->getId();
        $basket = App::call()->basketRepository->getBasket($session_id); 
        
       foreach($basket as $item) {

            if($item['prod_id'] == $id){
               
                $basket_id = $item['basket_id'];
                $quantity = App::call()->basketRepository->getOne($basket_id)->quantity += 1;
            }

       }
       if($quantity > 1){
           $basket = App::call()->basketRepository->getOne($basket_id);
           $basket->quantity = $quantity;
           App::call()->basketRepository->save($basket);
       } else {
           $basket = new Basket($session_id, $id);
           App::call()->basketRepository->save($basket);
       }
   
        $response = [
            'status' => 'ok',
            'count' =>  App::call()->basketRepository->getCountWhere('session_id', $session_id),
            // 'quantity' => App::call()->basketRepository->getBasket('session_id', $session_id)->quantity
        ];
        echo  json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        die();
    }
    public function actionDelete()
    {
        $id =  App::call()->request->getParams()['id'];
        $session_id = App::call()->session->getId();
        $error = 'ok';
        $basket =  App::call()->basketRepository->getOne($id);

        if (!$basket) {
            $error = 'error2';
        } else {
            if ($session_id == $basket->session_id) {
                if($basket->quantity > 1){

                    $quantity = $basket->quantity -= 1;
                    
                    App::call()->basketRepository->save($basket);
                    
                    
                } else {
                    $quantity = 0;
                    App::call()->basketRepository->delete($basket);
                }
                
            } else {
                $error = 'error1';
            }
        }


        $response = [
            'status' => $error,
            'count' => App::call()->basketRepository->getCountWhere('session_id', $session_id),
            'quantity' => $quantity
        ];
        echo  json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        die();
    }
}
