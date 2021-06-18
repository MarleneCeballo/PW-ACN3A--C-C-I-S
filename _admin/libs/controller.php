<?php

class Controller{

    function __construct()
    {
      
       $this->view = new View();
    }


    function loadModel($model){
        $url = 'model/'.$model.'.php';
        if (file_exists($url)){
            require $url;
            $modelName = $model;
            $this->modelo = new $modelName();
        }
    }

}



?>