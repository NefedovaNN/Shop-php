<?php
// define('ROOT', dirname(__DIR__));

// define('DS', dirname(DIRECTORY_SEPARATOR));
// define("CONTROLLER_NAMESPACE", "app\\controllers\\");
// define("VIEWS_DIR", "../views/");

use app\engine\Db;
use app\engine\Request;
use app\engine\Session;
use app\models\repositories\BasketRepository;
use app\models\repositories\OrdersRepository;
use app\models\repositories\ProductRepository;
use app\models\repositories\ReviewsRepository;
use app\models\repositories\UserRepository;

return [
    'root' => dirname(__DIR__),
    'controllers_namespaces' => "app\\controllers\\",
    'views_dir' => "../views/",
    'components' => [
        'db' => [
            'class' => Db::class,
            'driver' => 'mysql',
            'host' => 'localhost',
            'login' => 'test',
            'password' => 'point1503',
            'database' => 'shop',
            'charset' => 'utf8'
        ],
        'request' => [
            'class' => Request::class
        ],
        'basketRepository' => [
           'class' => BasketRepository::class
        ],
        'productRepository' => [
            'class' => ProductRepository::class
        ],
        'userRepository' => [
            'class' => UserRepository::class
        ],
        'ordersRepository' => [
            'class' => OrdersRepository::class
        ],
        'reviewsRepository' => [
            'class' => ReviewsRepository::class
        ],
        'session' => [
            'class' => Session::class
        ]
    ]
];
