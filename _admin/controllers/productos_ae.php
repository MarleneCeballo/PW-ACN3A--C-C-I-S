<?php
Class Productos_ae extends Controller{

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
        $productos = $this->model;
        $this->view->productos = $productos;

        $this->view->render("productos/productos_ae",$productos);
    }


}


?>