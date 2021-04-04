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
						echo '<ul>';
						echo '<li>';
						echo '<a href="'.$linkCategoria.'">Categorias</a><br>';
						echo '</li>';
							echo '<ul>';
							foreach ($categorias as $categoria) {
								echo '<li>';
								echo '<a href="'.$thisFile.'?idcategoria='.$categoria['id'].
								'&idmarca='.$idMarca.'">'.$categoria['nombre'].'</a><br />';
								echo '</li>';
							}
							echo '</ul>';
					echo '</ul>';
				
					echo '<ul>';
					echo '<li>';
					echo '<a href="'.$linkMarca.'">Marcas</a><br>';
					echo '</li>';
						echo '<ul>';
						foreach ($marcas as $marca) {
							echo '<li>';
							echo '<a href="'.$thisFile.'?idcategoria='.$idCategoria.'&idmarca='.$marca['id'].'">'.$marca['nombre'].'</a><br />';
							echo '</li>';
							// ?id_categoria=2&id_marca=
						}
						echo '</ul>';
				echo '</ul>';
			}
				?>
				<div class="container">
				
				<div class="row">
				<?php		
				foreach ($productos as $producto) {
					if(($producto["id_marca"] == $idMarca || $idMarca == "") && ($producto["id_genero"] == $idCategoria || $idCategoria == "")){
					$rutaImagen = $producto["id"];
					echo '<div class="col-sm-4">';
					echo '<div class="card-columns-fluid">';
					echo '<img src="img/./.jpg" class="card-img-top" alt="'. $producto["nombre"] .'">';
					echo '<div class="card-body">';
					echo '	<h5 class="card-title">'. $producto["nombre"] .'</h5>';
					echo  '<p class="card-text"> Las nuevas ' . $producto["nombre"] .'!</p>';
					echo	'<p class="card-text "><small class="text-muted">Nuevas!</small></p> </div>';
					echo'<div class="card-footer text-center">';
					echo	'<a class="btn btn-primary" href="detalle.php?id_producto='.$producto['id'].'" role="button">Detalles aqui!</a>' ;
					echo'</div>';
					echo'</div>';
					echo'</div>';
				}
				};

				
				?>