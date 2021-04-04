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
		
		
			<!-- ----------------------------------------| DESTACADOS | BANNER |----------------------------------------------->

			<div class="card text-right">

				
				<?php foreach ($productos as $producto) {
					if($producto["id"] == 5){
						echo'<a href="detalle.php?id_producto='.$producto['id'].'"><img src="'.$producto['imagengrande'].'" class="card-img h-50"  alt="destacado-banner"></a><div class="card-img-overlay">';
				
					echo "<h5 class='card-title'>". $producto["nombre"] . "</h5>";
					}}
				?>
					<p class="card-text">Nuevas Nike Payp 2.0 Blue Turbo!</p>
					<p class="card-text"><small class="text-muted">En stock!</small> </p>
				</div>

			</div>

			<!-- ----------------------------------------| DESTACADOS | BANNER | FIN |----------------------------------------------->

			<!-- ----------------------------------------| DESTACADOS | 6 cards |----------------------------------------------->
			<div class="card-deck">
			<?php foreach ($productos as $producto) {
					if($producto["id"] == 2 || $producto["id"] == 3 || $producto["id"] == 7 ){
						
						echo '<div class="card">';
						echo'<a href="detalle.php?id_producto='.$producto['id'].'"><img width="200px" src="'.$producto["imagenmini"].'" class="card-img-top" alt="'.$producto["nombre"].'"></a>';
						echo'<div class="card-body">';
						echo'<h5 class="card-title">'.$producto["nombre"].'</h5>';
						echo'<p class="card-text">Las nuevas '.$producto["nombre"].'!</p>';
						echo'<p class="card-text "><small class="text-muted">Nuevas!</small></p></div>';
							echo'<div class="card-footer text-center"><small class="text-muted">En Stock!</small></div></div>';
						
					}}
				?>
				</div>
			
				<div class="card-deck">
			<?php foreach ($productos as $producto) {
					if($producto["id"] == 5 || $producto["id"] == 1|| $producto["id"] == 8 ){
						
						echo '<div class="card">';
						echo'<a href="detalle.php?id_producto='.$producto['id'].'"><img width="200px" src="'.$producto["imagenmini"].'" class="card-img-top" alt="'.$producto["nombre"].'"></a>';
						echo'<div class="card-body">';
						echo'<h5 class="card-title">'.$producto["nombre"].'</h5>';
						echo'<p class="card-text">Las nuevas '.$producto["nombre"].'!</p>';
						echo'<p class="card-text "><small class="text-muted">Nuevas!</small></p></div>';
							echo'<div class="card-footer text-center"><small class="text-muted">En Stock!</small></div></div>';
						
					}}
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