<?php 
class Comentarios_aeModelo extends Model{
    function __construct()
    {
		parent::__construct();
      
	}
    public function getList(){
		$query = "SELECT id_usuarios, nombre 
		           FROM usuarios";
				   
        return $this->db->query($query); 
	}
    

}


?>