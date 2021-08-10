<div class="d-flex" id="wrapper">
		<!-- ----------------------------------------| SIDEBAR | FILTROS |----------------------------------------------->
		<div class="border-right" id="sidebar-wrapper">
		<!-- ----------------------------------------| CATEGORIA |----------------------------------------------->
		<?php
		$mysqli = new mysqli($hostname, $username,$password, $database);
				if (isset($_REQUEST['idcategoria'])){
				$idCategoria = $_REQUEST['idcategoria'];
			}
			else{
				$idCategoria = '';
			}
			if (isset($_REQUEST['idmarca'])){
				$idMarca = $_REQUEST['idmarca'];
			}
			else{
				$idMarca = '';
			}
			if (isset($_GET['order'])){
				$order = $_GET['order'];
			
				$filterorder = "&order=" . $_GET['order'];
			}
			else{
				$order = "";
				$filterorder = "";
			
			}
			if (isset($_GET['filter'])){
				
				$filter = "&filter=NEWS";
			}
			else{
				
				$filter = "";
			}
			
			
			
			
				$thisFile = "productos.php";
				$linkCategoria = $thisFile.'?idcategoria=&idmarca='.$idMarca;
				$sql = "SELECT * FROM `marcas`";
				$result = mysqli_query($mysqli, $sql) or die("Error in Selecting " . mysqli_error($mysqli));
				$emparray = array();
					while($row =mysqli_fetch_assoc($result))
				{
					$emparray[] = $row;
				}

				$marcas = $emparray;
				
				

				$sql2 = "SELECT * FROM `categorias`";
				$result2 = mysqli_query($mysqli, $sql2) or die("Error in Selecting " . mysqli_error($mysqli));
				$emparray2 = array();
					while($row =mysqli_fetch_assoc($result2))
				{
					$emparray2[] = $row;
				}

				
				$linkMarca = $thisFile.'?idcategoria=&idmarca='.$idCategoria;
				$categorias = $emparray2;
			

				// $productos = json_decode(file_get_contents('.\data\productos.json'), true);
					// $productos = json_decode(file_get_contents('C:\xampp\htdocs\ProgramacionWeb\PW2-G2-09-23-Ceballo-Carballal-Seijas-Iza\data\productos.json'), true);
						
					$curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);  
					if($curPageName == "productos.php"){

				echo'<div class="sidebar-heading nav-link"> World Shoes </div>';
				echo'<div class="list-group list-group-flush">';
				echo'<a href="'.$linkCategoria.'" class="list-group-item list-group-item-action nav-link dropdown-toggle" id="navbarDropdown"';
				
				echo'role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categorias</a>';
				echo'<div class="dropdown-menu dropdown-menu" aria-labelledby="navbarDropdown">';
				foreach ($categorias as $categoria) {
					if($categoria['activo'] == 1){
					echo '<a class="dropdown-item" href="'.$thisFile.'?idcategoria='.$categoria['id'].
								'&idmarca='.$idMarca.$filterorder.$filter.'">'.$categoria['nombre'].'</a><br />';
							}
					
				}

				echo '</div></div>';


				echo'<div class="list-group list-group-flush">';
				echo'<a href="#" class="list-group-item list-group-item-action nav-link dropdown-toggle" id="navbarDropdown"role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Marcas</a>';
				echo '<div class="dropdown-menu dropdown-menu" aria-labelledby="navbarDropdown">';

				foreach ($marcas as $marca) {
					if($marca['activo'] == 1){
					echo '<a class="dropdown-item" href="'.$thisFile.'?idcategoria='.$idCategoria.'&idmarca='.$marca['id'].$filterorder.$filter.'">'.$marca['nombre'].'</a><br />';
					$sql = "SELECT * FROM `zapatillas` where id_marca = ".$marca['id'];
					}
				}

					
				echo '</div></div>';
				

			}?>
	

		
			

			<!-- ----------------------------------------| MARCA |----------------------------------------------->

 
		
		</div> 
        <!-- ----------------------------------------| SIDEBAR | FIN |----------------------------------------------->
        <!-- ----------------------------------------| DESTACADOS |----------------------------------------------->

		<div id="page-content-wrapper">

<nav class="navbar navbar-expand-lg navbar-light border-bottom">
	<?php
	if($curPageName == "productos.php"){
		echo'<button class="btn" id="menu-toggle">Filtros</button>';
	}
	?>
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