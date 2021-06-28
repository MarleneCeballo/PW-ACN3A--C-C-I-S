<?php require_once('./inc/header.php');?>

<div class="container-fluid">
      
      <?php 
        $productosMenu = 'Productos';
	      $productos = $this -> productos;
	      require_once('./inc/side_bar.php');
      ?>
	  
	  
        
        <div class="col-sm-9 col-md-10 main">
          
          <!--toggle sidebar button-->
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          
		  <h1 class="page-header">
          Productos
          </h1>
 

          <h2 class="sub-header">Listado <a href="productos_ae"><button type="button" class="btn btn-success" title="Agregar">Add</button></a></h2>
          <div id="myBtnContainer">
		  <button class="btn active" onclick="filterSelection('all')"> Todos</button>
  		  <button class="btn" onclick="filterSelection('adidas')"> Adidas</button>
  		  <button class="btn" onclick="filterSelection('nike')"> Nike</button>
        <button class="btn" onclick="filterSelection('converse')"> Converse</button>
        <button class="btn" onclick="filterSelection('dc')"> DC</button>
        <button class="btn" onclick="filterSelection('vans')"> Vans</button>
		  </div>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th> 
                  <th>Modelo</th>
                  <th>Precio</th>
                  <th>Activo</th> 
				  <th>Acciones</th>
                </tr>
              </thead>
			  <tbody>
				<?php  	 
					foreach($productos as $producto){?>
              <?php
              switch($producto['id_marca']){
              case 1:
                 echo'<tr class="filterDiv adidas">';
                  break;
              case 2:
                  echo'<tr class="filterDiv nike">';
                  break;
              case 3:
                echo'<tr class="filterDiv converse">';
                  break;
              case 4:
                echo'<tr class="filterDiv dc">';
                  break;
              case 5:
                echo'<tr class="filterDiv vans">';
                  break;
              
              default:
              echo'<tr class="filterDiv">';
                break;
              }
             
              ?>
						
						  <td><?php echo $producto['id'];?></td>
                          <td><?php echo $producto['nombre'];?></td> 
                          <td><?php echo $producto['modelo'];?></td>
                          <td><?php echo $producto['precio'];?></td>
						 
              <td><?php echo $producto['activo'];?></td> 
						  <td>
						      <a href="./productos_ae?edit=<?php echo $producto['id']?>"><button type="button" class="btn btn-info" title="Modificar">M</button></a>
							  <a href="?delete=<?php echo $producto['id']?>"><button type="button" class="btn btn-danger" title="Borrar">X</button></a>
					      </td>
						</tr>
				    <?php }?>                
              </tbody>
            </table>
          </div>
 
          
      </div><!--/row-->
	</div>
</div><!--/.container-->
<script src="./script/filter.js"></script>
<?php include('inc/footer.php')?>