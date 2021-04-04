<!DOCTYPE html>
<html lang="en">


<?php 
	$title = "Nosotros";
	require_once('head.php');
?>
<body>
<?php
		
		require('sidebar.php');

		?>
			<!-- ----------------------------------------| GRUPO | NOMBRE y APELLIDO |------------------------------------>
			<div class="card mb-12" style="max-width: width auto;">
				<div class="row no-gutters">
					<div class="col-md-2">
						<img src="img/alumna2.jpeg" class="card-img " alt="...">
					</div>
					<div class="col-md-8">
						<div class="card-body">
							<h5 class="card-title">Marlene Ceballo</h5>
							<p class="card-text">This is a wider card with supporting text below as a natural lead-in to
								additional content. This content is a little bit longer.</p>
							<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
						</div>
					</div>
				</div>
			</div>
			
			<div class="card mb-12" style="max-width: width auto;">
				
				<div class="row no-gutters">

					<div class="col-md-8">
						<div class="card-body">
							<h5 class="card-title">Kevin Carballal</h5>
							<p class="card-text">This is a wider card with supporting text below as a natural lead-in to
								additional content. This content is a little bit longer.</p>
							<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
						</div>
					</div>
					<div class="col-md-2">
						<img src="img/alumno1.jpg" class="card-img" alt="...">
					</div>
				</div>

			</div>

			<div class="card mb-12" style="max-width: width auto;">
				<div class="row no-gutters">
					<div class="col-md-2">
						<img src="img/alumno4.jpeg" class="card-img perfil" alt="...">
					</div>
					<div class="col-md-8">
						<div class="card-body">
							<h5 class="card-title">Eluney Iza</h5>
							<p class="card-text">This is a wider card with supporting text below as a natural lead-in to
								additional content. This content is a little bit longer.</p>
							<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
						</div>
					</div>
				</div>
			</div>

			<div class="card mb-12" style="max-width: width auto;">
				
				<div class="row no-gutters">

					<div class="col-md-8">
						<div class="card-body">
							<h5 class="card-title">Luciano Seijas</h5>
							<p class="card-text">This is a wider card with supporting text below as a natural lead-in to
								additional content. This content is a little bit longer.</p>
							<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
						</div>
					</div>
					<div class="col-md-2">
						<img src="img/alumno3ls.jpg" class="card-img" alt="...">
					</div>
				</div>


			</div>

			<!-- ----------------------------------------| GRUPO | NOMBRE y APELLIDO |------------------------------------>



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