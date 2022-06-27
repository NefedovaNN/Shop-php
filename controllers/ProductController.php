<?php
namespace app\controllers;

use app\engine\App;


class ProductController extends Controller
{
    protected function actionIndex()
    {
      echo  $this->render('index');
    }
    protected function actionCatalog()
    {
        $page = App::call()->request->getParams()['page'] ?? 0;
        // $catalog = App::call()->productRepository->getLimit(($page + 1)*3);
        $catalog = App::call()->productRepository->getAll();
       echo $this->render('product/catalog', [
            'catalog' => $catalog,
            // 'page' => ++$page,
        ]); 
     
    }
    protected function actionCard()
    {
        $id = App::call()->request->getParams()['id'];
       $product = App::call()->productRepository->getOne($id);
       
     echo $this->render('product/card', [
          'product' => $product
      ]);
      
    }
    
}