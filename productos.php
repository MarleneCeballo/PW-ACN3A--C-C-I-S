<!DOCTYPE html>
<html lang="en">


<?php 
	$title = "Productos";
	require_once('head.php');
	require_once 'login.php';
	 $mysqli = new mysqli($hostname, $username,$password, $database);
	 $thisFile = "productos.php";
	 
?>

<body>
	<?php
		require('sidebar.php');
		$categoria="";
		$marca = "";
		$filterorder = "";
		$filternew = "";
		
		if(isset($_GET['idcategoria'])){
			$categoria = "&idcategoria=" . $_GET['idcategoria'];
		}
		if(isset($_GET['idmarca'])){
			$marca = "&idmarca=" . $_GET['idmarca'];
		}
		
		

		?>

		
			<!-- ----------------------------------------| DESTACADOS | 6 cards |----------------------------------------------->
			
				<?php 
				// if(isset($change)){
					// $change = $change;
				// }else{
				// $change = "";
				// }
				?>
			
				<div class="container">
				<div class="row">
				
				
				
				<a href="productos.php?order=ASC<?php echo $categoria . $marca ?>" class="list-group-item list-group-item-action nav-link col-4 text-center"  role="button" >A -> Z</a>
				<a href="productos.php?order=DESC<?php echo $categoria . $marca ?>" class="list-group-item list-group-item-action nav-link col-4 text-center"  role="button" >Z -> A</a>
				<a href="productos.php?filter=NEWS<?php echo $categoria . $marca?>" class="list-group-item list-group-item-action nav-link col-4 text-center"  role="button" >Nuevos</a>
				
				</div>
				<div class="row">
				<?php	
				
				if (isset($_GET['order'])){
					$order = $_GET['order'];
					$ordenar = "ORDER BY nombre ".$order;
					$filterorder = "&order=" . $_GET['order'];
				}
				else{
					$order = "";
					$ordenar = " ";
				}
				if (isset($_GET['filter'])){
					
					$filtrar = "WHERE nuevo = 'si' and activo = 1 ";
				}
				else{
					
					$filtrar = " WHERE activo = 1 ";
				}
				
				
				$query =  "SELECT * FROM zapatillas "  . $filtrar . $ordenar;
				 
				 
				 $resultado=$mysqli->query($query);
				 
				foreach ($resultado as $rows) {
					if(($rows["id_marca"] == $idMarca || $idMarca == "") && ($rows["id_genero"] == $idCategoria || $idCategoria == "")){
					
					echo '<div class="col-sm-4 pt-1">';
					echo '<div class="card-columns-fluid">';
					echo '<img src="'. $rows["imagenmini"].'" class="card-img-top" alt="'. $rows["nombre"] .'">';
					if($rows["nuevo"] == "si"){
						echo '<span class="badge badge-danger">Nuevo</span>';
					}
					echo '<div class="card-body">';
					echo '	<h5 class="card-title">'. $rows["nombre"] .'</h5>';
					echo  '<p class="card-text"> Las nuevas ' . $rows["nombre"] .'!</p>';
					echo	'<p class="card-text "><small class="text-muted">Nuevas!</small></p> </div>';
					echo'<div class="card-footer text-center">';
					echo	'<a class="btn btn-primary" href="detalle.php?id_producto='.$rows['id'].'" role="button">Detalles aqui!</a>' ;
					echo'</div>';
					echo'</div>';
					echo'</div>';
				}
				};

				
				?>
			</div>
			</div>

	<?php
		require('footer.php');
		?>

		<!-- Bootstrap core JavaScript -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

		<!--------| FILTROS RESPONSIVE ----------------------------------------------- Menu Toggle Script -->
		<script>
			$("#menu-toggle").click(function (e) {
				e.preventDefault();
				$("#wrapper").toggleClass("toggled");
			});
		</script>

</body>

</html>