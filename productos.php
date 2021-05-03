<!DOCTYPE html>
<html lang="en">


<?php 
	$title = "Productos";
	require_once('head.php');
	require_once 'login.php';
	 $mysqli = new mysqli($hostname, $username,$password, $database);
?>

<body>
	<?php
		require('sidebar.php');
		?>

		
			<!-- ----------------------------------------| DESTACADOS | 6 cards |----------------------------------------------->
			
				<?php 
				
				?>
			
				<div class="container">
				<div class="row">
				<div class="list-group list-group-flush">
				
				<a onClick="<?php $query = "SELECT * FROM zapatillas ORDER BY nombre DESC"; ?>" class="list-group-item list-group-item-action nav-link" id=""role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">A -> Z</a>	

				<form action='' method='POST'>
				<input type='submit' name='submit' />
				</form>
				<?php if(isset($_POST['submit'])){
				$query = "SELECT * FROM zapatillas ORDER BY nombre DESC"; 
				$resultado=$mysqli->query($query);
				}?>
				</div>
				</div>
				<div class="row">
				<?php		
				 
				 $query = "SELECT * FROM zapatillas";
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