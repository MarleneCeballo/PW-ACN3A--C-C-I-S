<?php
Class Comentarios_ae extends Controller{

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
	  
        $query = "SELECT * FROM comentarios WHERE id = $id";
				   
        $query = $this->model->db->prepare($query); 
		$query -> execute();
		$comentarios = $query->fetch(PDO::FETCH_OBJ);
		
            return $comentarios;
	}
    


    function render(){
      
      
        if(isset($_GET['editar'])){
            $comentarios = $this->get($_GET['editar']); 
            $this -> view -> comentarios = $comentarios;
          } 
        
        $this->view->render("comentarios/comentarios_ae");
    }
    public function editar($data){
	    $id = $data['id'];
	    unset($data['id']);
		// 	
		$this-> db = new Database();
        $this -> db = $this -> db -> conectar();
    

			$sql = "UPDATE comentarios SET aprobado= ".$data['aprobado']." WHERE id = $id";
            
			$this-> db-> exec($sql);
			 
	} 


}


?>