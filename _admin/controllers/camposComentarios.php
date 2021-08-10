<?php 

Class CamposComentarios extends Controller{


	public function __construct(){
		parent::__construct();
		if(isset($_POST['formulario_camposComentarios'])){ 
            if($_POST['id'] > 0){
                    $this->editar($_POST); 
                   
            }else{
                $this->save($_POST); 
            }
            
            header('Location: camposComentarios');
        }	
        
    
        if(isset($_GET['delete'])){

            $this->delete($_GET['delete']);
            header('Location: camposComentarios');
    
        }
	}
	public function loadModel($model){
		$model = "CamposComentarios";
		$url = './model/CamposComentarios.php';
        if (file_exists($url)){
            require $url;
            $modelName = 'CamposComentariosModelo';
            $this->model = new $modelName();
        }
    }

  
	public function getList(){
		
		$query = "SELECT * FROM campos_dinamicos where type != 'p'";
	    return $this->model->db->query($query); 
	}

	function render(){
		
		$camposComentarios = $this -> getList();
        $this->view->camposComentarios = $camposComentarios;
        $this->view->render("camposComentarios/index");
    }

	
	public function save($data){
		$this-> db = new Database();
        $this -> db = $this -> db -> conectar();
            foreach($data as $key => $value){
				
				if(!is_array($value)){
					if($value != null){
						$columns[]=$key;
						$datos[]=$value;
					}
				}
			}
		
            $sql = "INSERT INTO campos_dinamicos(".implode(',',$columns).") VALUES('".implode("','",$datos)."')";
		
            $this->  db ->exec($sql);
	
	} 
	/**
	* Actualizo los datos en la base de datos
	*/
	public function editar($data){
		$data['activo'] = isset($_POST['activo'])?1:0;
	    $id = $data['id'];
	    unset($data['id']);
		// 	
		$this-> db = new Database();
        $this -> db = $this -> db -> conectar();
    

			$sql = "UPDATE campos_dinamicos SET activo= ".$data['activo']." WHERE id = $id";
            
			$this-> db-> exec($sql);
			header('Location: camposComentarios');
	} 

	

	public function delete($id){
	
		$this-> db = new Database();
        $this -> db = $this -> db -> conectar();
		$query = 'SELECT count(1) as cantidad FROM campos_comentarios WHERE id = '.$id;
		$consulta = $this->db->query($query)->fetch(PDO::FETCH_OBJ);
		if($consulta->cantidad){
			$query = "UPDATE `campos_dinamicos` SET `activo`= 0  WHERE id = ".$id."; ";
			$this->db->exec($query); 
			return 1;
		}
	}
      

}
?>
