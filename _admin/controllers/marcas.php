<?php 
Class Marcas extends Controller{

	
	public function __construct(){
		parent::__construct();
		if(isset($_POST['formulario_marcas'])){ 
			if($_POST['id'] > 0){
					$this->edit($_POST); 
				   
			}else{
				
					$this->save($_POST); 
			}
			
			header('Location: marcas');
		}	
		 
		if(isset($_GET['delete'])){
				$this->del($_GET['delete']);
				
				
	
		}
		
	}

	function render(){
		
		$marcas = $this->model->getList();
		$this->view->marcas = $marcas;
        $this->view->render("marcas/index",$marcas);
    }

	public function del($id){
		
		$this-> db = new Database();
        $this -> db = $this -> db -> conectar();
		$query = 'SELECT count(1) as cantidad FROM marcas WHERE id = '.$id;
		$consulta = $this->db->query($query)->fetch(PDO::FETCH_OBJ);
		if($consulta->cantidad){
			$query = "UPDATE `marcas` SET `activo`= 0  WHERE id = ".$id."; ";
			$this->db->exec($query); 
			return 1;
		}

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
            $sql = "INSERT INTO marcas( ".implode(',',$columns).") VALUES('".implode("','",$datos)."')";
			//echo $sql;die();
			
            $this->  db ->exec($sql);
			
			 
	} 
	
	

	
	public function edit($data){
		
			$data['activo'] = isset($_POST['activo'])?1:0;
			
			$id = $data['id'];
			unset($data['id']);
        $this-> db = new Database();
        $this -> db = $this -> db -> conectar();
            // foreach($data as $key => $value){
			// 	if(!is_array($value)){
			// 		if($value != null){	
			// 			$columns[]=$key." = '".$value."'"; 
			// 		}
			// 	}
            // }
            // $sql = "UPDATE marcas SET ".implode(',',$columns)." WHERE id = ".$id;
			$sql = "UPDATE marcas SET id=$id, nombre= ".'"'.$data['nombre'].'"'.", activo= ".$data['activo']." WHERE id = $id";
			
            $this-> db-> exec($sql);

			header('Location: marcas');
	} 
}
?>