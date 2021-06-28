<?php 

Class Comentarios extends Controller{


	public function __construct(){
		parent::__construct();
		if(isset($_POST['formulario_comentarios'])){ 
            if($_POST['id'] > 0){
                    $this->editar($_POST); 
                   
            }else{
                $this->save($_POST); 
            }
            
            header('Location: comentarios');
        }	
        
    
        if(isset($_GET['delete'])){

            $this->delete($_GET['delete']);
            header('Location: comentarios');
    
        }
	}
	public function loadModel($model){
		$model = "Comentarios";
		$url = './model/Comentarios.php';
        if (file_exists($url)){
            require $url;
            $modelName = 'ComentariosModelo';
            $this->model = new $modelName();
        }
    }

  
	public function getList(){
		
		$query = "SELECT id,id_producto,nombre,apellido,comentario,estrellas,email,aprobado 
		           FROM comentarios";
	    return $this->model->db->query($query); 
	}

	function render(){
		
		$comentarios = $this -> getList();
        $this->view->comentarios = $comentarios;
        $this->view->render("comentarios/index");
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
			//var_dump($datos);die();
            $sql = "INSERT INTO comentarios(".implode(',',$columns).") VALUES('".implode("','",$datos)."')";
			//echo $sql;die();
			
            $this->  db ->exec($sql);
	
	} 
	/**
	* Actualizo los datos en la base de datos
	*/
	public function editar($data){
		$data['aprobado'] = isset($_POST['aprobado'])?1:0;
	    $id = $data['id'];
	    unset($data['id']);
		// 	
		$this-> db = new Database();
        $this -> db = $this -> db -> conectar();
    

			$sql = "UPDATE comentarios SET aprobado= ".$data['aprobado']." WHERE id = $id";
            
			$this-> db-> exec($sql);
			header('Location: comentarios');
	} 



	public function delete($id){
	
		$this-> db = new Database();
        $this -> db = $this -> db -> conectar();
		$query = 'SELECT count(1) as cantidad FROM comentarios WHERE id = '.$id;
		$consulta = $this->db->query($query)->fetch(PDO::FETCH_OBJ);
		if($consulta->cantidad){
			$query = "UPDATE `comentarios` SET `aprobado`= 0  WHERE id = ".$id."; ";
			$this->db->exec($query); 
			return 1;
		}
	}
      

}
?>
