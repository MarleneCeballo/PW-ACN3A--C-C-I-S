<!DOCTYPE html>
<?php  session_start();
require_once('../../config/config.php');
// corregir rutas absolutas de abajo 
require_once('C:\xampp\htdocs\Programacion2021\PW-ACN3A-C-C-I-S\_admin\controllers\usuarios.php');
require_once('C:\xampp\htdocs\Programacion2021\PW-ACN3A-C-C-I-S\_admin\controllers\perfil.php');


try {
        $con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);
        
} catch (PDOException $e) {
        print "�Error!: " . $e->getMessage();
        die();
}


$user = new Usuario($con);

if(isset($_POST['login'])){
	$user->login($_POST);
}
 
if(isset($_GET['logout'])){
    unset($_SESSION['usuario']); 
}
	 
if($user->notLogged()){
  header('Location: ../../index.php');
}

?>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Admin - World Shoes</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/styles.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
		
	</head>
	<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Hola <?php echo $_SESSION['usuario']['nombre']?></a>
        </div>
      </div>
</nav>