<?php 

Class Usuarios extends Controller{

    /*conexion a la base*/
	private $con;
	

	public function __construct(){
		parent::__construct();
		if(isset($_POST['submit'])){ 
            if($_POST['id_usuario'] > 0){
                    $this->edit($_POST); 
                   
            }else{
                $this->save($_POST); 
            }
            
            header('Location: usuarios');
        }	
        
    
        if(isset($_GET['del'])){
            $this->del($_GET['del']);
                header('Location: usuarios');
    
        }
	}
	public function loadModel($model){
		$model = "Usuarios";
		$url = './model/Usuarios.php';
        if (file_exists($url)){
            require $url;
            $modelName = 'UsuariosModelo';
            $this->model = new $modelName();
        }
		// $url = './model/'.$model.'.php';
		
        // if (file_exists($url)){
        //     require $url;
        //     $modelName = $model.'Modelo';
        //     $this->model = new $modelName();
        // }
		
    }

      // pasar getlist al model
	public function getList(){
		
		$query = "SELECT id_usuario,nombre,apellido,email,usuario,clave,activo 
		           FROM usuarios ";
		$resultado = array();
		foreach($this->model->db->query($query) as $key=>$usuario){
			$resultado[$key] = $usuario;
			$sql = 'SELECT nombre 
					  FROM perfil 
					  INNER JOIN usuarios_perfiles ON (usuarios_perfiles.perfil_id = perfil.id)
					  WHERE usuarios_perfiles.usuario_id = '.$usuario['id_usuario'];
			foreach($this->model->db->query($sql) as $perfil){
				$resultado[$key]['perfiles'][] = $perfil['nombre'];
			}
			
			
		}
			
            return $resultado; 
	}

	function render(){
		$query = 'SELECT * FROM permisos';
        $permisos = $this->model->db->query($query);
        $this->view->permisos = $permisos;
		$users = $this;
        $this->view->users = $users;
        $this->view->render("usuarios/index");
    }

	// public function save($data){
	// 	$this-> db = new Database();
    //     $this -> db = $this -> db -> conectar();
    //         foreach($data as $key => $value){
				
	// 			if(!is_array($value)){
	// 				if($value != null){
	// 					$columns[]=$key;
	// 					$datos[]=$value;
	// 				}
	// 			}
	// 		}
	// 		//var_dump($datos);die();
    //         $sql = "INSERT INTO perfil(".implode(',',$columns).") VALUES('".implode("','",$datos)."')";
	// 		//echo $sql;die();
			
    //         $this->  db ->exec($sql);
	// 		$id = $this-> db ->lastInsertId();
			   			
	// 		$sql = '';
	// 		foreach($data['permisos'] as $permisos){
	// 			$sql .= 'INSERT INTO perfil_permisos(perfil_id,permiso_id) 
	// 						VALUES ('.$id.','.$permisos.');';
	// 		}
 	// 		$this->  db ->exec($sql);
			 
	// } 
	
	public function save($data){
		$this-> db = new Database();
        $this -> db = $this -> db -> conectar();
			$data['salt'] = uniqid();
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
            $this->db->exec($sql);
			$id_usuario = $this->db->lastInsertId();
			  			
			$sql = '';
			foreach($data['perfil'] as $perfil){
				$sql .= 'INSERT INTO usuarios_perfiles(usuario_id,perfil_id) 
							VALUES ('.$id_usuario.','.$perfil.');';
			}
 			$this->db->exec($sql);
	} 
	
	/**
	* Actualizo los datos en la base de datos
	*/
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
	public function edit($data){
	    $id = $data['id_usuario'];
	    unset($data['id_usuario']);
		// var_dump($data);exit;
		$this-> db = new Database();
        $this -> db = $this -> db -> conectar();
            if( $data['clave'] != null){
				$user = $this-> get($id);
                $data['clave'] = $this->encrypt($data['clave'],$user->salt);
            }else{
                unset($data['clave']);
			}
			foreach($data as $key => $value){
				if(!is_array($value)){
					if($value != null){	
						$columns[]=$key." = '".$value."'"; 
					}
				}
            }
            $sql = "UPDATE usuarios SET ".implode(',',$columns)." WHERE id_usuario = ".$id;
            
			$this-> db-> exec($sql);
			 
			 
			$sql = 'DELETE FROM usuarios_perfiles WHERE usuario_id = '.$id;
			$this-> db-> exec($sql);
			
			$sql = '';
			foreach($data['perfil'] as $perfil => $t){
				$sql .= 'INSERT INTO usuarios_perfiles(usuario_id,perfil_id) 
							VALUES ('.$id.','.$t['id'].');';
			}
 			$this-> db-> exec($sql);
	} 

	private function encrypt($clave,$salt){
		
		$clave .= $salt;
		return hash('md5',$clave);
	}
        

        // public function del($id){
			
		// 	$query = "UPDATE `usuarios` SET `activo`= 0  WHERE id = ".$id."; ";
		// 	$this->model->db->exec($query); 
		// 	return 1;
		
        // }
		
	public function del($id){
		
		$this-> db = new Database();
        $this -> db = $this -> db -> conectar();
		$query = 'SELECT count(1) as cantidad FROM usuarios WHERE id_usuario = '.$id;
		$consulta = $this->db->query($query)->fetch(PDO::FETCH_OBJ);
		if($consulta->cantidad){
			$query = "UPDATE `usuarios` SET `activo`= 0  WHERE id_usuario = ".$id."; ";
			$this->db->exec($query); 
			return 1;
		}

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
