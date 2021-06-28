<?php
Class Categorias_ae extends Controller{

    public function __construct(){
		parent::__construct();
        
    }
    public function loadModel($model){
		$url = 'model/'.$model.'.php';
        if (file_exists($url)){
            require $url;
            $modelName = $model.'Modelo';
            $this->model = new $modelName();
        }
    }
    function render(){
   
        $categorias = $this->model;
        $this->view->categorias = $categorias;

        $this->view->render("categorias/categorias_ae");
    }


}


?>