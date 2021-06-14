<?php 
Class Categoria{

    /*conexion a la base*/
	private $con;
	
	public function __construct($con){
		$this->con = $con;
	}

	public function getList(){
		$query = "SELECT id, nombre 
		           FROM categorias";
        return $this->con->query($query); 
	}
	
	
	/**
	* Guardo los datos en la base de datos
	*/
	public function save($data){
		
            foreach($data as $key => $value){
				
				if(!is_array($value)){
					if($value != null){
						$columns[]=$key;
						$datos[]=$value;
					}
				}
			}
			//var_dump($datos);die();
            $sql = "INSERT INTO categorias(".implode(',',$columns).") VALUES('".implode("','",$datos)."')";
			//echo $sql;die();
			
            $this->con->exec($sql);
			$id = $this->con->lastInsertId();
			   			
			$sql = '';
			foreach($data['permisos'] as $permisos){
				$sql .= 'INSERT INTO perfil_permisos(perfil_id,permiso_id) 
							VALUES ('.$id.','.$permisos.');';
			}
			//echo $sql;die();

 			$this->con->exec($sql);
	} 
	
	
    public function del($id){
		$query = 'SELECT count(1) as cantidad FROM categorias WHERE id = '.$id;
		$consulta = $this->con->query($query)->fetch(PDO::FETCH_OBJ);
		if($consulta->cantidad == 0){
			$query = "DELETE FROM categorias WHERE id = ".$id.";";

			$this->con->exec($query); 
			return 1;
		}
		
	}
	
	public function edit($data){
			$id = $data['id'];
			unset($data['id']);
            
            foreach($data as $key => $value){
				if(!is_array($value)){
					if($value != null){	
						$columns[]=$key." = '".$value."'"; 
					}
				}
            }
            $sql = "UPDATE categorias SET ".implode(',',$columns)." WHERE id = ".$id;
            //echo $sql; die();
            $this->con->exec($sql);
			 
	} 
}
?>