<!DOCTYPE html>
<html lang="en">


<?php 
	$title = "Detalle Producto";
    require_once('head.php');
    require_once 'login.php';
    $mysqli = new mysqli($hostname, $username,$password, $database);
?>

<body>

		<!-- ----------------------------------------| SIDEBAR | FILTROS |----------------------------------------------->
		
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
		

		
			<!-- ----------------------------------------| DESTACADOS | BANNER |----------------------------------------------->
        <?php 
        if(isset($_REQUEST['id_producto'])){
            $id_producto = $_REQUEST['id_producto'];
            // $id_producto = $_REQUEST['id_producto']-1;
        }else{
            $id_producto = "";
        }
        $sql = "SELECT * FROM `zapatillas` where id = " . $id_producto;
				$result = mysqli_query($mysqli, $sql) or die("Error in Selecting " . mysqli_error($mysqli));
				$emparray = array();
					while($row =mysqli_fetch_assoc($result))
				{
					$emparray[] = $row;
				}
        
				$producto = $emparray;
        // $productos = json_decode(file_get_contents('.\data\productos.json'), true);
        // $producto = $productos[$id_producto-1];
       
        ?>
			<div class="card text-right">
                <div class="container col-sm-7">
                <a href=""><img src="<?php echo $producto[0]['imagengrande']?>" class="card-img w-100" alt="<?php echo $producto[0]['nombre']?>"></a>
                </div>
				<div class="card-img-overlay text-center">
					<h5 class="card-title"><?php echo $producto[0]["nombre"]?></h5>
					<p class="card-text">Nuevas <?php echo $producto[0]['nombre']?>!</p>
					<p class="card-text"><small class="text-muted">En stock!</small> </p>
				</div>
            </div>
            
            <div class="container">
                <h3 class="text-center">Descripcion</h3>
                <ul>
                    <li>Precio: $<?php echo $producto[0]['precio']?></li>
                    <li>Talle: 37 a 40</li>
                    <li>Codigo articulo: <?php echo $producto[0]['id']?></li>
                    <?php $consulta = "SELECT ROUND(AVG(estrellas),0)  FROM comentarios WHERE  id_producto=". $_REQUEST['id_producto'] ." and aprobado = 1"; 
                        $ranking = mysqli_query($mysqli, $consulta) or die("Error in Selecting " . mysqli_error($mysqli));
                        $row= mysqli_fetch_array($ranking);
                        if($row["ROUND(AVG(estrellas),0)"] > 0){
                          echo "<li>Promedio Estrellas: ". $row["ROUND(AVG(estrellas),0)"] ."</li>";
                        }
                      
                    ?>
                      <?php
                  $sql = "SELECT DISTINCT c.* FROM campos_dinamicos c inner join productos_campos p ON p.campoid = c.id inner join zapatillas z ON z.id = p.productoid where c.activo = 1 and c.type = 'p' and p.productoid =". $producto[0]["id"];
                  // var_dump($sql);
                  $resultcoments = mysqli_query($mysqli, $sql) or die("Error in Selecting " . mysqli_error($mysqli));
                  $arrayprods = array();
                  while($row =mysqli_fetch_assoc($resultcoments))
                  {
                    $arrayprods[] = $row;
                  }
                  foreach($arrayprods as $campos){
                  //   echo'<pre>';
                  //  var_dump($campos);
                  //  echo'</pre>';
                    echo"<li>". $campos['nombre'] ."</li>";
                  }
                  
                  
                  ?>
                </ul>

            </div>

            <div class="container">
            
            <div class="mt-5 pt-2 mb-5 d-block">
                <div class="container text-center pt-5 mt-5 mision rounded shadow">
                   <img src="img/logo.recort.png" alt="Logo" class="logo" width="100px">
                    <form class="pb-2" action="" method="POST">
                <div class="form-row pt-5">
                
                  <div class="form-group col-md-4">
                    <label for="nombre">Nombre</label>
                    <input type="text" value="<?php $id_producto= $id_producto; echo $id_producto?>" name="nombre" class="form-control"> 
                   
                  </div>
                  <div class="form-group col-md-4">
                    <label for="apellido">apellido</label>
                    <input type="text" value="<?php $id_producto= $id_producto; echo $id_producto?>" name="apellido" class="form-control"> 
                   
                  </div>
                  
                  <div class="form-group col-md-4">
                      <label for="email">Email</label>
                      <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                    </div>
                
                  
                  <div class="form-group col-lg-4 col-sm-12 col-md-4">
                    <label for="estrellas">estrellas</label>
                    <select id="estrellas" name="estrellas" class="form-control text-center">
                      <option selected>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                      
                    </select>
                  </div>
                
                  <div class="form-group col-12">
                  
                  <label for="comentario">Comentario</label>
                  <textarea name="comentario" class="form-control pb-2" id="comentario" rows="8"></textarea>
                 <?php $sql = "SELECT DISTINCT c.* FROM campos_dinamicos c inner join comentarios_campos p ON p.campoid = c.id inner join zapatillas z ON z.id = p.productoid where c.type != 'p' and p.productoid =". $producto[0]["id"];
                      $resultcoments = mysqli_query($mysqli, $sql) or die("Error in Selecting " . mysqli_error($mysqli));
                      $arraycoms2 = array();
                      while($row =mysqli_fetch_assoc($resultcoments))
                      {
                        $arraycoms2[] = $row;
                      }
                      foreach($arraycoms2 as $campos){
                        if($campos['type'] == "checkbox"){
                          echo'<label class="form-group col-lg-4 col-sm-12 col-md-4" for= '. $campos['nombre'] .'>'. $campos['nombre'] .'</label><br>';
                        
                        }else if($campos['type'] == "textarea"){
                          echo'<label class="form-group col-lg-4 col-sm-12 col-md-4" for="textarea">'. $campos['nombre'] .'</label>';
                          echo'<textarea  class="form-control pb-2" name="textarea" required></textarea><br>';
                         echo '<input type="hidden" class="form-control" id="campoid" name="campoid" placeholder="" value="'.$campos['id'].'">';
                        }
                      }?>
                  <button type="submit" class="btn btn-primary pt-2" onclick="comEnviado()">Enviar</button>
                  
                  <script> 
                  function comEnviado() {
                    alert("Comentario enviado");
                  }
                  </script>

                </div>
                </div>
                </div>
                
                
                </form>
                </div>
            </div>
            <?php
             
              // `id_producto` int(11) NOT NULL,
              // `nombre` varchar(20) NOT NULL,
              // `apellido` varchar(20) NOT NULL,
              // `comentario` varchar(300) NOT NULL,
              // `estrellas` int(1) NOT NULL,
              // `email` varchar(100) NOT NULL
              if (isset($_REQUEST['email']) && isset($_REQUEST['comentario']) && isset($_REQUEST['estrellas'])&& isset($_REQUEST['apellido'])&& isset($_REQUEST['nombre'])){
                $email = $_REQUEST['email'];
                $apellido = $_REQUEST['apellido'];
                $comentario = $_REQUEST['comentario'];
                $estrellas = $_REQUEST['estrellas'];
                $nombre = $_REQUEST['nombre'];
                var_dump($_REQUEST);
              $sql = "INSERT INTO comentarios(id_producto,nombre,apellido,comentario,estrellas,email) 
                        VALUES (".$id_producto.",'".$nombre."','".$apellido."','".$comentario."',".$estrellas.",'".$email."');";
              if ($mysqli->query($sql) === TRUE) {
                $sql2 = "Select * from comentarios";
                $resultcoments = mysqli_query($mysqli, $sql2) or die("Error in Selecting " . mysqli_error($mysqli));
                $arraycoms = array();
                $ultimoId ="";
                  while($row =mysqli_fetch_assoc($resultcoments))
                {
                  $ultimoId = $row['id'];
                }
              
                if (isset($_REQUEST['textarea'])) {

                     
                      $sql3 = "INSERT INTO comentarios_campos(comentarioId,productoid,campoid,valor) values (". $ultimoId .",". $_REQUEST['id_producto'] .",".$_REQUEST['campoid'] .",'".$_REQUEST["textarea"]."')";
                      mysqli_query($mysqli, $sql3);
                      var_dump($sql3);
                      
              }

              }
              else{echo "Error al ejecutar el comando:".$mysqli->error;}
              
            }
              ?>

            
            <div class="container">
            <h3 class="text-center pt-2 col-12">Comentarios</h3>
            <?php               
                $sql = "SELECT * FROM `comentarios` where id_producto = " . $id_producto;
               
                $resultcoments = mysqli_query($mysqli, $sql) or die("Error in Selecting " . mysqli_error($mysqli));
                $arraycoms = array();
                  while($row =mysqli_fetch_assoc($resultcoments))
                {
                  $arraycoms[] = $row;
                }
                  foreach($arraycoms as $comentario){
                    
                      if($comentario['aprobado'] != 0){
               echo" <div class='row pl-5'>";
                echo    "<ul class='text-decoration-none list-unstyled'>";
                echo        '<li>Nombre: '. $comentario['nombre'] . '</li>';
                echo        '<li>Apellido: '. $comentario['apellido'] . '</li>';
                echo       "<li>Mail:". $comentario['email'] ."</li>";
                echo       "<li>Comentario:" . $comentario['comentario'] ."</li>";
                echo        "<li>Calificacion:" . $comentario['estrellas'] . " estrellas</li>";
                echo        "<li></li>";
                $sql = "SELECT cdin.nombre, cd.valor FROM comentarios_campos cd INNER JOIN comentarios c ON c.id = cd.comentarioid INNER JOIN campos_dinamicos cdin ON cdin.id = cd.campoid WHERE c.id =". $comentario['id'];
                $resultcoments = mysqli_query($mysqli, $sql) or die("Error in Selecting " . mysqli_error($mysqli));
                $arraycoms = array();
                  while($row =mysqli_fetch_assoc($resultcoments))
                {
                  $arraycoms[] = $row;
                }
                foreach($arraycoms as $comentario){
                  echo '<li>'.$comentario['nombre'].': '. $comentario['valor'] . '</li>';
                }
                echo   "</ul>";
                echo "</div>";
                echo "<hr>";
                      }
                   
                     
             }  
            ?>
                

                </div>
</div>
            </div>
            
			<!-- ----------------------------------------| DESTACADOS | BANNER | FIN |----------------------------------------------->

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