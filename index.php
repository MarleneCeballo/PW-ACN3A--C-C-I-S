<!DOCTYPE html>
<html lang="en">


<?php 
	$title = "Home";
	require_once('head.php');
?>
<body>
		<?php
		require('sidebar.php');
		$productos = json_decode(file_get_contents('.\data\productos.json'), true);
		?>
		
		
    <?php
	require_once 'login.php';
	 $mysqli = new mysqli($hostname, $username,$password, $database);
       
		// $resultado = $resultado -> fetch_all(PDO::FETCH_ASSOC);
    ?>   
            <!-- <table border="1">
               
            </table> -->
    <?php 
    //     $resultado->free();
    // ?>
	
			<div class="card-deck">
			<?php
			 $query = "SELECT * FROM zapatillas WHERE id in(2,3,7)";
			 $resultado=$mysqli->query($query);
			foreach ($resultado as $rows) {
				
						
						echo '<div class="card">';
						echo'<a href="detalle.php?id_producto='.$rows['id'].'"><img width="200px" src="'.$rows["imagenmini"].'" class="card-img-top" alt="'.$rows["nombre"].'"></a>';
						echo'<div class="card-body">';
						echo'<h5 class="card-title">'.$rows["nombre"].'</h5>';
						echo'<p class="card-text">Las nuevas '.$rows["nombre"].'!</p>';
						echo'<p class="card-text "><small class="text-muted">Nuevas!</small></p></div>';
							echo'<div class="card-footer text-center"><small class="text-muted">En Stock!</small></div></div>';
						
					}
				?>
				</div>
			
				<div class="card-deck">
				<?php
			 $query = "SELECT * FROM zapatillas WHERE id in(5,1,8)";
			 $resultado=$mysqli->query($query);
			foreach ($resultado as $rows) {
				
						
						echo '<div class="card">';
						echo'<a href="detalle.php?id_producto='.$rows['id'].'"><img width="200px" src="'.$rows["imagenmini"].'" class="card-img-top" alt="'.$rows["nombre"].'"></a>';
						echo'<div class="card-body">';
						echo'<h5 class="card-title">'.$rows["nombre"].'</h5>';
						echo'<p class="card-text">Las nuevas '.$rows["nombre"].'!</p>';
						echo'<p class="card-text "><small class="text-muted">Nuevas!</small></p></div>';
							echo'<div class="card-footer text-center"><small class="text-muted">En Stock!</small></div></div>';
						
					}
				?>
				</div>
			<!-- ----------------------------------------| DESTACADOS | 6 cards | FIN | ----------------------------------------------->

		</div>
	</div>
	<!-- ----------------------------------------| DESTACADOS | FIN |----------------------------------------------->

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