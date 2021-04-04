<div class="d-flex" id="wrapper">
		<!-- ----------------------------------------| SIDEBAR | FILTROS |----------------------------------------------->
		<div class="border-right" id="sidebar-wrapper">
		<!-- ----------------------------------------| CATEGORIA |----------------------------------------------->
		<?php
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

				$thisFile = "productos.php";
				$linkCategoria = $thisFile.'?idcategoria=&idmarca='.$idMarca;
				$marcas = json_decode(file_get_contents('.\data\marcas.json'), true);
				
				
				$linkMarca = $thisFile.'?idcategoria=&idmarca='.$idCategoria;
				$categorias = json_decode(file_get_contents('.\data\categorias.json'), true);
			

				$productos = json_decode(file_get_contents('.\data\productos.json'), true);
					// $productos = json_decode(file_get_contents('C:\xampp\htdocs\ProgramacionWeb\PW2-G2-09-23-Ceballo-Carballal-Seijas-Iza\data\productos.json'), true);
						
					$curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);  
					if($curPageName == "productos.php"){

				echo'<div class="sidebar-heading nav-link"> World Shoes </div>';
				echo'<div class="list-group list-group-flush">';
				echo'<a href="'.$linkCategoria.'" class="list-group-item list-group-item-action nav-link dropdown-toggle" id="navbarDropdown"';
				echo'role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categorias</a>';
				echo'<div class="dropdown-menu dropdown-menu" aria-labelledby="navbarDropdown">';
				foreach ($categorias as $categoria) {
					echo '<a class="dropdown-item" href="'.$thisFile.'?idcategoria='.$categoria['id'].
								'&idmarca='.$idMarca.'">'.$categoria['nombre'].'</a><br />';
					
				}

				echo '</div></div>';


				echo'<div class="list-group list-group-flush">';
				echo'<a href="#" class="list-group-item list-group-item-action nav-link dropdown-toggle" id="navbarDropdown"role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Marcas</a>';
				echo '<div class="dropdown-menu dropdown-menu" aria-labelledby="navbarDropdown">';

				foreach ($marcas as $marca) {
					echo '<a class="dropdown-item" href="'.$thisFile.'?idcategoria='.$idCategoria.'&idmarca='.$marca['id'].'">'.$marca['nombre'].'</a><br />';
					
					
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
                <a class="nav-link" href="nuevos.php" alt="ProductosNuevos | productos.html">Nuevos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contacto.php" alt="Contacto | contacto.html">Contacto</a>
			</li>
        </ul>

    </div>

</nav>