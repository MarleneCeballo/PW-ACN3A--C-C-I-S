<?php
Class Perfiles_ae extends Controller{

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
        $query = 'SELECT * FROM permisos';
        $permisos = $this->model->db->query($query);
        $this->view->permisos = $permisos;

        $perfiles = $this->model;
        $this->view->perfiles = $perfiles;

        $this->view->render("perfiles/perfiles_ae",$permisos);
    }


}


?>