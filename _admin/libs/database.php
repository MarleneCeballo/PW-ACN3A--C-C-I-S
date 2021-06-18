<?php

class Database{
    private $host;
    private $db;
    private $user;
    private $password;
    private $port;

    public function __construct()
    {
        $this->host = constant('hostname');
        $this->db = constant('database');
        $this->user = constant('username');
        $this->password = constant('password');
        $this->port = constant('port');

    }

    public function connect(){

        try{
            $conexion = 'mysql:host='.$this->host.';port='.$this->port.';dbname='.$this->db;
            $options = [
                PDO::ATTR_ERRMODE           => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES  => false,
            ];

            $pdo = new PDO($conexion, $this->user , $this->password , $options);
            return $pdo;

        }catch(PDOException $e){
            print_r('Error en Conexion : '. $e->getMessage());
        }
    }
}

?>