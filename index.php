<!DOCTYPE html>
<html lang="en">


<?php 
	$title = "Home";
	require_once('head.php');
?>
<body>
<div id="page-content-wrapper">

<nav class="navbar navbar-expand-lg navbar-light border-bottom">
	
	<a class="nav-link" href="index.php" alt="Home | index.html">
    <img src="img/logo_en_negro.png" alt="Logo" class="pl-4" width="100px"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse"
        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="index.php" alt="Home | index.html">Home </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="productos.php" alt="Productos | productos.html">Productos</a>
			</li> 
			
            <li class="nav-item">
                <a class="nav-link" href="contacto.php" alt="Contacto | contacto.html">Contacto</a>
			</li>
        </ul>

    </div>

</nav>
		
		
		
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
		
			 $query = "SELECT * From zapatillas WHERE destacado = 1 and activo = 1 ORDER BY RAND() LIMIT 3 ";
			 
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
			
				$query = "SELECT * From zapatillas WHERE destacado = 1 and activo = 1 ORDER BY RAND() LIMIT 3 OFFSET 3";
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