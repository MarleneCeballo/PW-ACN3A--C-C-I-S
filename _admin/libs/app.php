<?php

require_once 'controllers/errores.php';

class App{

    function __construct(){
        $url = isset($_GET['url']) ? $_GET['url']: null;
        $url = rtrim($url, '/');
        $url = explode('/',$url);
        $ruta = empty($url[0]) ? 'main' : $url[0];
        
        $archivocontrolador = 'controllers/' . $ruta . '.php';
        echo $archivocontrolador;
        if(file_exists($archivocontrolador)){
            
            require_once $archivocontrolador;
            $controlador = new $ruta;
            $controlador->loadModel($ruta);
            echo " entro";
            //hay un metodo
            if (isset($url[1])){
                $controlador->{$url[1]}();
            }else{
                $controlador->render();
            }
        }else{
                $controlador = new Errores();
        }
       
        
    }

}

?>