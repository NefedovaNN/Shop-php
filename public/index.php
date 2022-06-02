<?php

use app\engine\App;

session_start();

require_once '../vendor/autoload.php';
$config = include "../config/config.php";

try {

    App::call()->run($config);


} catch (PDOException $exception) {

   var_dump($exception->getMessage());

}catch(Exception $exception){

    var_dump($exception);

}











