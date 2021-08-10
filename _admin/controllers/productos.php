<?php 
Class Productos extends Controller{

	
	public function __construct(){
		parent::__construct();
		if(isset($_POST['formulario_asignarCampos'])){ 
			$this->asignar($_POST); 
		}
		if(isset($_POST['formulario_productos'])){ 
			
			if($_POST['id'] > 0){
				
						$this->edit($_POST); 
					
				   
			}else{
				
					$this->save($_POST); 
			}
			
			header('Location: productos');
		}	
		 
		if(isset($_GET['delete'])){
				$this->del($_GET['delete']) ;
		}
		
	}
	function render(){
	
		$productos = $this->model->getList();
		$this->view->productos = $productos;
        $this->view->render("productos/index",$productos);
    }

	public function del($id){
		
		$this-> db = new Database();
        $this -> db = $this -> db -> conectar();
		$query = 'SELECT count(1) as cantidad FROM zapatillas WHERE id = '.$id;
		$consulta = $this->db->query($query)->fetch(PDO::FETCH_OBJ);
		if($consulta->cantidad){
			$query = "UPDATE `zapatillas` SET `activo`= 0  WHERE id = ".$id."; ";
			$this->db->exec($query); 
			return 1;
		}

	}
	public function save($data){
		$this-> db = new Database();
        $this -> db = $this -> db -> conectar();
		// var_dump($data);exit;
            foreach($data as $key => $value){
				
				if(!is_array($value)){
					if($value != null){
						$columns[]=$key;
						$datos[]=$value;
					}
				}
			}
			//var_dump($datos);die();
            $sql = "INSERT INTO zapatillas(".implode(',',$columns).") VALUES('".implode("','",$datos)."')";
			//echo $sql;die();
			
            $this->  db ->exec($sql);
			
			   			
			// $sql = '';
			// foreach($data['productos'] as $permisos){
			// 	$sql .= 'INSERT INTO productos(id,permiso_id) 
			// 				VALUES ('.$id.','.$permisos.');';
			// }
 			// $this->  db ->exec($sql);
			 
	} 
	
	public function edit($data){
			$data['activo'] = isset($_POST['activo'])?1:0;
			$id = $data['id'];
			unset($data['id']);
        $this-> db = new Database();
        $this -> db = $this -> db -> conectar();
            foreach($data as $key => $value){
				if(!is_array($value)){
					if($value != null){	
						$columns[]=$key." = '".$value."'"; 
					}
				}
            }
            $sql = "UPDATE zapatillas SET ".implode(',',$columns)." WHERE id = ".$id;
          
			// var_dump($sql);exit;
            $this-> db-> exec($sql);
			
			 
			header('Location: productos');
	} 

	public function asignar($data){
		
		$id = $data['productoid'];
		$this-> db = new Database();
        $this -> db = $this -> db -> conectar();
		// var_dump($data);exit;
            foreach($data as $key => $value){
				
				if(!is_array($value)){
					if($value != null){
						$columns[]=$key;
						$datos[]=$value;
					}
				}
			}
			
			//var_dump($datos);die();
            $sql ='';
			//  "INSERT INTO productos_campos(".implode(',',$columns).") VALUES('".implode("','",$datos)."')";
			//echo $sql;die();
			
			foreach($data['campoid'] as $campos){
				$sql .= 'INSERT INTO productos_campos(productoid,campoid) 
							VALUES ('.$id.','.$campos.');';
			}

            $this->  db ->exec($sql);
		 
		header('Location: productos');
} 
// 	public function editCampos($data){
// 		$this-> db = new Database();
//         $this -> db = $this -> db -> conectar();
// 		// var_dump($data);exit;
//             foreach($data as $key => $value){
				
// 				if(!is_array($value)){
// 					if($value != null){
// 						$columns[]=$key;
// 						$datos[]=$value;
// 					}
// 				}
// 			}
// 			//var_dump($datos);die();
//             $sql = "INSERT INTO campos_dinamicos(".implode(',',$columns).") VALUES('".implode("','",$datos)."')";
// 			//echo $sql;die();
			
//             $this->  db ->exec($sql);
// } 
}
?>