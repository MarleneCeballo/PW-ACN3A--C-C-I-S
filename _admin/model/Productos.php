<?php 
class ProductosModelo extends Model{
	
	
    function __construct()
    {
		parent::__construct();
	}

	public function getList(){
		$query = "SELECT *
		           FROM zapatillas";
				   
        return $this->db->query($query); 
	}

	
	
	public function get($id){
	    $query = "SELECT * FROM zapatillas WHERE id = $id";
	
				   
        $query = $this->db->prepare($query); 
		$query -> execute();
		$productos = $query->fetch(PDO::FETCH_OBJ);

			
            return $productos;
	}


} 

?>