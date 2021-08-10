<?php
Class AsignarCampos_ae extends Controller{

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
    public function get($id){
	  
        $query = "SELECT * FROM campos_dinamicos WHERE id = $id";
				   
        $query = $this->model->db->prepare($query); 
		$query -> execute();
		$comentarios = $query->fetch(PDO::FETCH_OBJ);
		
            return $comentarios;
	}
    


    function render(){
      
      
        if(isset($_GET['editCampos'])){
            $query = "SELECT * FROM campos_dinamicos";
            $campos = $this -> model -> db -> query($query);
            $this -> view -> campos = $campos;

            $comentarios = $this->get($_GET['editCampos']); 
            $this -> view -> comentarios = $comentarios;
          } 
        
        $this->view->render("asignarCampos/asignarCampos_ae");
    }
   


}


?>