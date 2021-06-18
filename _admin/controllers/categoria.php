<?php 
Class Categoria{

    
	private $con;
	
	public function __construct($con){
		$this->con = $con;
	}

	public function getList(){
		$query = "SELECT id, nombre 
		           FROM categorias";
        return $this->con->query($query); 
	}
	

	public function save($data){
		
            foreach($data as $key => $value){
				
				if(!is_array($value)){
					if($value != null){
						$columns[]=$key;
						$datos[]=$value;
					}
				}
			}
			
            $sql = "INSERT INTO categorias(".implode(',',$columns).") VALUES('".implode("','",$datos)."')";
			
			
            $this->con->exec($sql);
			$id = $this->con->lastInsertId();
			   			
			$sql = '';
			foreach($data['permisos'] as $permisos){
				$sql .= 'INSERT INTO perfil_permisos(perfil_id,permiso_id) 
							VALUES ('.$id.','.$permisos.');';
			}
			

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
         
            $this->con->exec($sql);
			 
	} 
}
?>