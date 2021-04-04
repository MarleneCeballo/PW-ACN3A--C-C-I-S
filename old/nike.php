<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Home | Word Shoes </title>
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
					<img src="img/nike/nike-hombre/nike-1045-503415-1-zoom.jpg" class="card-img-top" alt="AIR MAX BELLA TR 2">
					<div class="card-body">
						<h5 class="card-title">Nike AIR MAX BELLA TR 2</h5>
						<p class="card-text"><small class="text-muted text-center">Temporada 2019</small></p>
					</div>
					<div class="card-footer text-center">
						<a class="btn btn-primary" href="adidas-astrarun.php" role="button">Detalles aqui!</a>
					</div>
				</div>
				<div class="card">
					<img src="img/nike/nike-hombre/nike-1548-803354-1-zoom.jpg" class="card-img-top" alt="Zoom Rival Fly">
					<div class="card-body">
						<h5 class="card-title">Nike Zoom Rival Fly</h5>
						<p class="card-text"><small class="text-muted text-center">Temporada 2019</small></p>
					</div>
					<div class="card-footer text-center">
						<a class="btn btn-primary" href="adidas-astrarun.php" role="button">Detalles aqui!</a>
					</div>
				</div>
				<div class="card">
					<img src="img/nike/nike-hombre/nike-8229-567854-1-zoom.jpg" class="card-img-top" alt="Air Max Axis">
					<div class="card-body">
						<h5 class="card-title">Nike Air Max Axis</h5>
						<p class="card-text "><small class="text-muted">Nuevas!</small></p>
					</div>
					<div class="card-footer text-center">
						<a class="btn btn-primary" href="adidas-astrarun.php" role="button">Detalles aqui!</a>
					</div>
				</div>

            </div>
            
            <div class="card-deck">
				<div class="card">
					<img src="img/nike/nike-hombre/nike-9172-958994-1-zoom.jpg" class="card-img-top" alt="Renew Lucent">
					<div class="card-body">
						<h5 class="card-title">Nike Renew Lucent</h5>
						<p class="card-text"><small class="text-muted">Nuevas!</small></p>
					</div>
					<div class="card-footer text-center">
						<a class="btn btn-primary" href="adidas-astrarun.php" role="button">Detalles aqui!</a>
					</div>
				</div>
				<div class="card">
					<img src="img/nike/nike-mujer/nike-1038-703415-1-zoom.jpg" class="card-img-top" alt="AMIXA">
					<div class="card-body">
						<h5 class="card-title">Nike AMIXA</h5>
						<p class="card-text"><small class="text-muted text-center">Temporada 2019</small></p>
					</div>
					<div class="card-footer text-center">
						<a class="btn btn-primary" href="adidas-astrarun.php" role="button">Detalles aqui!</a>
					</div>
				</div>
				<div class="card">
					<img src="img/nike/nike-mujer/nike-1052-903415-1-zoom.jpg" class="card-img-top" alt="RENEW RUN">
					<div class="card-body">
						<h5 class="card-title">Nike RENEW RUN</h5>
						<p class="card-text"><small class="text-muted text-center">Temporada 2019</small></p>
					</div>
					<div class="card-footer text-center">
						<a class="btn btn-primary" href="adidas-astrarun.php" role="button">Detalles aqui!</a>
					</div>
				</div>

            </div>
            
            <div class="card-deck">
				<div class="card">
					<img src="img/nike/nike-mujer/nike-9165-758994-1-zoom.jpg" class="card-img-top" alt="Air Max Command">
					<div class="card-body">
						<h5 class="card-title">Nike Air Max Command</h5>
						<p class="card-text "><small class="text-muted">Nuevas!</small></p>
					</div>
					<div class="card-footer text-center">
						<a class="btn btn-primary" href="adidas-astrarun.php" role="button">Detalles aqui!</a>
					</div>
				</div>
				<div class="card">
					<img src="img/nike/nike-mujer/nike-9277-347044-1-zoom.jpg" class="card-img-top" alt="Md Runner 2 Se">
					<div class="card-body">
						<h5 class="card-title">Nike Md Runner 2 Se</h5>
						<p class="card-text"><small class="text-muted">Nuevas!</small></p>
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