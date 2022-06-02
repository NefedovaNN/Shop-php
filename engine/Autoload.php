<?php
namespace app\engine;
class Autoload
{
    
    public function loadClass($className)
    {
            $fileName = str_replace('\\', DS, $className);
            $newfileName = str_replace( 'app\\', ROOT . DS, $fileName) . '.php';
            if (file_exists($newfileName)) {

                include $newfileName;
             
            }
        
    }
}