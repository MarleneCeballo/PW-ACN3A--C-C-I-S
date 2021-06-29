<?php

class Controller{

    function __construct()
    {
      
       $this->view = new View();
    }

    public function loadModel($model){
		$url = 'model/'.$model.'.php';
        if (file_exists($url)){
            require $url;
            $modelName = $model.'Modelo';
            $this->model = new $modelName();
          
        }
    }
}



?>