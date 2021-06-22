<?php

class Database{
    private $host;
    private $db;
    private $user;
    private $password;
    private $port;
    private $con;
    public function __construct()
    {
        $this->host = constant('hostname');
        $this->db = constant('database');
        $this->user = constant('username');
        $this->password = constant('password');
        $this->port = constant('port');

        $stringConexion = "mysql:host=" . $this -> host .";dbname=" . $this -> db .";charset=utf8";
        try {
            $this -> con = new PDO($stringConexion, $this -> user, $this ->  password);
            $this -> con -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
           
        } catch (PDOException $th) {
            $this -> conexion = 'Error de conexion';
            echo "ERROR!!!: " . $th -> getMessage();
        }

    }

    public function conectar(){
        return $this -> con;
    }
    }


        
// try {
//     $con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);
    
// } catch (PDOException $e) {
//     print "�Error!: " . $e->getMessage();
//     die();
// }
    //     try{
    //         $conexion = 'mysql:host='.$this->host.';port='.$this->port.';dbname='.$this->db;
    //         $options = [
    //             PDO::ATTR_ERRMODE           => PDO::ERRMODE_EXCEPTION,
    //             PDO::ATTR_EMULATE_PREPARES  => false,
    //         ];

    //         $pdo = new PDO($conexion, $this->user , $this->password , $options);
    //         return $pdo;

    //     }catch(PDOException $e){
    //         print_r('Error en Conexion : '. $e->getMessage());
    //     }
    // }


?>