<?php
Class Usuarios_ae extends Controller{

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
	    // $query = "SELECT id_usuario, nombre
		//            FROM usuarios WHERE id_usuario = $id";
        $query = "SELECT * FROM usuarios WHERE id_usuario = $id";
				   
        $query = $this->model->db->prepare($query); 
		$query -> execute();
		$usuario = $query->fetch(PDO::FETCH_OBJ);
			
			$sql = "SELECT usuario_id, perfil_id
					  FROM usuarios_perfiles  
					  WHERE usuario_id = $usuario->id_usuario";
					  
			foreach($this->model->db->query($sql) as $perfiles){
				$usuario->perfiles[] = $perfiles['perfil_id'];
			}
			
            return $usuario;
	}

    function render(){
      
      
            $query = "SELECT * FROM perfil";
            $query = $this->model->db->prepare($query); 
            $query -> execute();
            $perfiles = $query->fetchAll(PDO::FETCH_OBJ);
            $this -> view -> perfiles = $perfiles;
        if(isset($_GET['edit'])){
            $usuario = $this->get($_GET['edit']); 
            $this -> view -> usuario = $usuario;
          } 
        
        $this->view->render("usuarios/usuarios_ae");
    }
    public function edit($data){
        $id = $data[0];
        
    $this-> db = new Database();
    $this -> db = $this -> db -> conectar();
        foreach($data as $key => $value){
            if(!is_array($value)){
                if($value != null){	
                    $columns[]=$key." = '".$value."'"; 
                }
            }
        }
        $sql = "UPDATE perfil SET ".implode(',',$columns)." WHERE id = ".$id;
        
        $this-> db-> exec($sql);
        
         
         
        $sql = 'DELETE FROM perfil_permisos WHERE perfil_id= '.$id;
        $this->  db->exec($sql);
        
        $sql = '';
        foreach($data['permisos'] as $permisos){
            $sql .= 'INSERT INTO perfil_permisos(perfil_id,permiso_id) 
                        VALUES ('.$id.','.$permisos.');';
        }
        $this->  db->exec($sql);
        header('Location: perfiles');
} 

}


?>