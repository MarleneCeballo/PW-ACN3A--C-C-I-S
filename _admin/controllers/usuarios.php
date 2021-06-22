<?php 

Class Usuario extends Controller{

    /*conexion a la base*/
	private $con;
	

	public function __construct(){
		parent::__construct();
	
	}
      // pasar getlist al model
	public function getList(){
		$query = "SELECT id_usuario,nombre,apellido,email,usuario,clave,activo 
		           FROM usuarios ";
		$resultado = array();
		foreach($this->con->query($query) as $key=>$usuario){
			$resultado[$key] = $usuario;
			$sql = 'SELECT nombre 
					  FROM perfil 
					  INNER JOIN usuarios_perfiles ON (usuarios_perfiles.perfil_id = perfil.id)
					  WHERE usuarios_perfiles.usuario_id = '.$usuario['id_usuario'];
			foreach($this->con->query($sql) as $perfil){
				$resultado[$key]['perfiles'][] = $perfil['nombre'];
			}
			
			
		}
			/* echo '<pre>';
			var_dump($resultado);echo '</pre>'; */
            return $resultado; 
	}

	function render(){
		
        $this->view->render("usuarios/index");
    }


	
	/**
	* Guardo los datos en la base de datos
	*/
	public function save($data){
			$data['salt'] = uniqid();
            // $data['salt'] = md5(date("Y-m-d H:i:s"));
            $data['clave'] = $this->encrypt($data['clave'],$data['salt']);
            
            foreach($data as $key => $value){
				if(!is_array($value)){
					if($value != null){
						$columns[]=$key;
						$datos[]=$value;
					}
				}
            }
            $sql = "INSERT INTO usuarios(".implode(',',$columns).") VALUES('".implode("','",$datos)."')";
            $this->con->exec($sql);
			$id_usuario = $this->con->lastInsertId();
			  			
			$sql = '';
			foreach($data['perfil'] as $perfil){
				$sql .= 'INSERT INTO usuarios_perfiles(usuario_id,perfil_id) 
							VALUES ('.$id_usuario.','.$perfil.');';
			}
 			$this->con->exec($sql);
	} 
	
	/**
	* Actualizo los datos en la base de datos
	*/
	public function edit($data){
	    $id = $data['id_usuario'];
	    unset($data['id_usuario']);
	    
            if( $data['clave'] != null){
				$user = $this-> model ->get($id);
                $data['clave'] = $this->encrypt($data['clave'],$user->salt);
            }else{
                unset($data['clave']);
			}
			
            foreach($data as $key => $value){
                if($value != null){
                    $columns[]=$key." = '".$value."'"; 
                }
            }
            $sql = "UPDATE usuarios SET ".implode(',',$columns)." WHERE id_usuario = ".$id;
            
            $this->con->exec($sql);
			
			 
			 
			$sql = 'DELETE FROM usuarios_perfiles WHERE usuario_id = '.$id;
			$this->con->exec($sql);
			
			$sql = '';
			foreach($data['perfil'] as $perfil){
				$sql .= 'INSERT INTO usuarios_perfiles(usuario_id,perfil_id) 
							VALUES ('.$id.','.$perfil.');';
			}
 			$this->con->exec($sql);
	} 
	
	/**
	* encrypt password
	*/
	
	
	
	/**
	* Login de usuario
	*/
	public function loadModel($model){
		$model = "Usuario";
		$url = 'model/Usuario.php';
        if (file_exists($url)){
            require $url;
            $modelName = 'UsuarioModelo';
            $this->model = new $modelName();
        }
    }

	private function encrypt($clave,$salt){
		
		$clave .= $salt;
		return hash('md5',$clave);
	}
	
        public function del($id){
			$sql = "DELETE FROM usuarios WHERE id_usuario = ".$id.';';
			$sql .= 'DELETE FROM usuarios_perfiles WHERE usuario_id = '.$id;

            $this->con->exec($sql);
        }
		
	public function login($data){
        $query = "SELECT id_usuario,nombre,apellido,email,usuario,clave,activo,salt
               FROM usuarios WHERE activo = 1 AND usuario = '".$data['usuario']."'";
        $datos = $this -> model -> db ->query($query)->fetch(PDO::FETCH_ASSOC);
         if(isset($datos['id_usuario'])){
            if($this->encrypt($data['clave'],$datos['salt']) == $datos['clave']){
            
                $_SESSION['usuarios'] = $datos;
                $query = "SELECT DISTINCT cod FROM permisos
                          INNER JOIN perfil_permisos ON (perfil_permisos.permiso_id = permisos.id)
                          INNER JOIN usuarios_perfiles ON (usuarios_perfiles.perfil_id = perfil_permisos.perfil_id)
                          WHERE usuario_id = ".$datos['id_usuario'];
                $permisos = array(); 
                foreach($this-> model ->db->query($query) as $key => $value){
                    $permisos['cod'][$key] = $value['cod'];
                }	
                    
                $_SESSION['usuarios']['permisos'] = $permisos;
            }
        } 
    }
	
       
	
        public function notLogged(){
            if(!isset($_SESSION['usuarios'])){
				return true;
			}
			return false;
        }
}
?>
