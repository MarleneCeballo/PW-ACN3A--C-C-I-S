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
        if(isset($_GET['edit'])){
            $query = 'SELECT * FROM comentarios where id_producto = ' . $_GET['edit'];
            $comentarios = $this->model->db->query($query);
            $this->view->comentarios = $comentarios; 
           
    }
      
        $productos = $this->model;
        $this->view->productos = $productos;

        $this->view->render("productos/productos_ae",$productos);
    }


}


?>