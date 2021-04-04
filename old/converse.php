<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Converse | World Shoes </title>
	<!-- Iconos Social Media -->
	<script src="https://kit.fontawesome.com/cedf025736.js" crossorigin="anonymous"></script>
	<!-- Bootstrap core CSS -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- GOOGLE FONT - Spartan 300 | 700 -->
	<link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300;700&display=swap" rel="stylesheet">
	<!-- CSS | index.html-->
	<link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body>
	<?php
		
		require('sidebar.php');

		?>

		
			<!-- ----------------------------------------| DESTACADOS | 6 cards |----------------------------------------------->
            
            <div class="card-deck">
				<div class="card">
					<img src="img/converse/converse-hombre/converse-1378-061284-1-zoom.jpg" class="card-img-top" alt="Stoke Ox">
					<div class="card-body">
						<h5 class="card-title">Converse Stoke Ox Faded</h5>
						<p class="card-text"><small class="text-muted">Temporada 2019</small></p>
					</div>
					<div class="card-footer text-center">
						<a class="btn btn-primary" href="adidas-astrarun.php" role="button">Detalles aqui!</a>
					</div>
				</div>

				<div class="card">
					<img src="img/converse/converse-hombre/converse-1684-341284-1-zoom.jpg" class="card-img-top" alt="Stoke Ox Faded">
					<div class="card-body">
						<h5 class="card-title">Converse Stoke Ox Faded</h5>
						<p class="card-text "><small class="text-muted">Nuevas!</small></p>
					</div>
					<div class="card-footer text-center">
						<a class="btn btn-primary" href="adidas-astrarun.php" role="button">Detalles aqui!</a>
					</div>
				</div>
				<div class="card">
					<img src="img/converse/converse-hombre/converse-3797-506905-1-zoom.jpg" class="card-img-top" alt="RIVAL OX">
					<div class="card-body">
						<h5 class="card-title">Converse RIVAL OX</h5>
						<p class="card-text"><small class="text-muted">Nuevas!</small></p>
					</div>
					<div class="card-footer text-center">
						<a class="btn btn-primary" href="adidas-astrarun.php" role="button">Detalles aqui!</a>
					</div>
				</div>

            </div>
            
            <div class="card-deck">
				<div class="card">
					<img src="img/converse/converse-hombre/converse-6285-906905-1-zoom.jpg" class="card-img-top" alt="CTAS LIFT OX">
					<div class="card-body">
						<h5 class="card-title">Converse CTAS LIFT OX</h5>
						<p class="card-text"><small class="text-muted">Temporada 2019</small></p>
					</div>
					<div class="card-footer text-center">
						<a class="btn btn-primary" href="adidas-astrarun.php" role="button">Detalles aqui!</a>
					</div>
				</div>
				<div class="card">
					<img src="img/converse/converse-mujer/converse-2671-379934-1-zoom.jpg" class="card-img-top" alt="Chuck Taylor All Star Metallic">
					<div class="card-body">
						<h5 class="card-title">Converse Chuck Taylor All Star Metallic</h5>
						<p class="card-text"><small class="text-muted">Temporada 2019</small></p>
					</div>
					<div class="card-footer text-center">
						<a class="btn btn-primary" href="adidas-astrarun.php" role="button">Detalles aqui!</a>
					</div>
				</div>
				<div class="card">
					<img src="img/converse/converse-mujer/converse-2988-868293-1-zoom.jpg" class="card-img-top" alt="Chuck Taylor All Star Hi Maroo">
					<div class="card-body">
						<h5 class="card-title">Converse Chuck Taylor All Star Hi Maroo</h5>
						<p class="card-text "><small class="text-muted">Nuevas!</small></p>
					</div>
					<div class="card-footer text-center">
						<a class="btn btn-primary" href="adidas-astrarun.php" role="button">Detalles aqui!</a>
					</div>
				</div>

            </div>
            
            <div class="card-deck">
				<div class="card">
					<img src="img/converse/converse-mujer/converse-3221-013403-1-zoom.jpg" class="card-img-top" alt="Chuck Taylor All Star Core OX">
					<div class="card-body">
						<h5 class="card-title">Converse Chuck Taylor All Star Core OX</h5>
						<p class="card-text"><small class="text-muted">Nuevas!</small></p>
					</div>
					<div class="card-footer text-center">
						<a class="btn btn-primary" href="adidas-astrarun.php" role="button">Detalles aqui!</a>
					</div>
				</div>
				<div class="card">
					<img src="img/converse/converse-mujer/converse-8325-255104-1-zoom.jpg" class="card-img-top" alt="Chuck Taylor All Star Monochro">
					<div class="card-body">
						<h5 class="card-title">Converse Chuck Taylor All Star Monochro</h5>
						<p class="card-text"><small class="text-muted">Temporada 2019</small></p>
					</div>
					<div class="card-footer text-center">
						<a class="btn btn-primary" href="adidas-astrarun.php" role="button">Detalles aqui!</a>
					</div>
				</div>

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