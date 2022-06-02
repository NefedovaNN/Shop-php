<?php

namespace app\controllers;

use app\engine\App;
use app\interfaces\IRender;
use app\models\repositories\BasketRepository;
use app\models\repositories\UserRepository;

class Controller
{
    private $action;
    private $defaultAction = 'index';
    private $render;

    public function __construct(IRender $render)
    {
        $this->render = $render;
    }

    public function runAction($action)
    {
        $this->action = $action ?: $this->defaultAction;
        $method = 'action' . ucfirst($this->action);
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            die('Нет такого экшена');
        }
    }
    public function render($template, $params = [])
    {
        return $this->render->renderTemplate('layouts/main', [
            'menu' => $this->renderTemplate('menu', [
                'userName' => App::call()->userRepository->getName(),
                'isAuth' => App::call()->userRepository->isAuth(),
                'isAdmin' => App::call()->userRepository->is_Admin(),
                'count' => App::call()->basketRepository->getCountWhere('session_id', session_id())
            ]),
            'content' => $this->renderTemplate($template, $params)
               
        ]);
    }
    public function renderTemplate($template, $params = [])
    {
        return $this->render->renderTemplate($template, $params);
    }
}
