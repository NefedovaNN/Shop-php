<?php
use app\engine\TwigRender;
require_once '../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('../templates/');

$twig = new \Twig\Environment($loader);

echo $twig->render('index.twig');

// echo $twig->render('/product/catalog.twig');