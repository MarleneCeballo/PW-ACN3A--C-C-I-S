<?php 
class CategoriasModelo extends Model{
	
	
    function __construct()
    {
		parent::__construct();
	}

	public function getList(){
		$query = "SELECT id, nombre, activo
		           FROM categorias";
				   
        return $this->db->query($query); 
	}

	
	
	public function get($id){
	    $query = "SELECT id, nombre, activo
		           FROM categorias WHERE id = $id";
	
				   
        $query = $this->db->prepare($query); 
		$query -> execute();
		$categorias = $query->fetch(PDO::FETCH_OBJ);
	
            return $categorias;
	}


} 

?>