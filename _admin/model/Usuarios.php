<?php 
class UsuariosModelo extends Model{
	
	
    function __construct()
    {
		parent::__construct();
       
	}

	public function get($id){
        $query = "SELECT id_usuario,nombre,apellido,email,usuario,clave,activo,salt
        FROM usuarios WHERE id_usuario = ".$id;
	
				   
        $query = $this->db->prepare($query); 
		$query -> execute();
		$usuario = $query->fetch(PDO::FETCH_OBJ);
			
        $sql = 'SELECT perfil_id
        FROM usuarios_perfiles  
        WHERE usuarios_perfiles.usuario_id = '.$usuario->id_usuario;
					  
			foreach($this->db->query($sql) as $perfil){
				$usuario->perfiles[] = $perfil['perfil_id'];
			}
			
            return $usuario;
	}
    
	

} 

?>