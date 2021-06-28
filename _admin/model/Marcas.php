<?php 
class MarcasModelo extends Model{
	
	
    function __construct()
    {
		parent::__construct();
	}

	public function getList(){
		$query = "SELECT id, nombre, activo
		           FROM marcas";
				   
        return $this->db->query($query); 
	}

	
	
	public function get($id){
	    $query = "SELECT id, nombre, activo
		           FROM marcas WHERE id = $id";
	
				   
        $query = $this->db->prepare($query); 
		$query -> execute();
		$marcas = $query->fetch(PDO::FETCH_OBJ);
	
            return $marcas;
	}


} 

?>