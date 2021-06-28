<?php 
class PerfilesModelo extends Model{
	
	
    function __construct()
    {
		parent::__construct();
	}

	public function getList(){
		$query = "SELECT id, nombre, activo 
		           FROM perfil";
				   
        return $this->db->query($query); 
	}

	
	
	public function get($id){
	    $query = "SELECT id, nombre, activo
		           FROM perfil WHERE id = $id";
	
				   
        $query = $this->db->prepare($query); 
		$query -> execute();
		$perfil = $query->fetch(PDO::FETCH_OBJ);
			
			$sql = "SELECT perfil_id, permiso_id
					  FROM perfil_permisos  
					  WHERE perfil_id = $perfil->id";
					  
			foreach($this->db->query($sql) as $permiso){
				$perfil->permisos[] = $permiso['permiso_id'];
			}
			
            return $perfil;
	}


} 

?>