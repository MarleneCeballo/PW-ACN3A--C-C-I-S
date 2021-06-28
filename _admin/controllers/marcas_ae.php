<?php
Class Marcas_ae extends Controller{

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
   
        $marcas = $this->model;
        $this->view->marcas = $marcas;

        $this->view->render("marcas/marcas_ae");
    }


}


?>