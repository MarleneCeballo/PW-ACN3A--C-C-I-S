<?php require_once('./inc/header.php');?>

<div class="container-fluid">
      
      <?php 
        $marcasMenu = 'Marcas';
	      $marcas = $this -> marcas;
	      require_once('./inc/side_bar.php');
      ?>
	  
	  
        
        <div class="col-sm-9 col-md-10 main">
          
          <!--toggle sidebar button-->
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          
		  <h1 class="page-header">
            Marcas
          </h1>
 

          <h2 class="sub-header">Listado <a href="marcas_ae"><button type="button" class="btn btn-success" title="Agregar">Add</button></a></h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th> 
                  <th>Activo</th> 
				          <th>Acciones</th>
                </tr>
              </thead>
			  <tbody>
				<?php  	 
					foreach($marcas as $marca){?>
              
						<tr>
						  <td><?php echo $marca['id'];?></td>
						  <td><?php echo $marca['nombre'];?></td> 
              <td><?php echo $marca['activo'];?></td> 
						  <td>
						      <a href="./marcas_ae?edit=<?php echo $marca['id']?>"><button type="button" class="btn btn-info" title="Modificar">M</button></a>
							  <a href="?delete=<?php echo $marca['id']?>"><button type="button" class="btn btn-danger" title="Borrar">X</button></a>
					      </td>
						</tr>
				    <?php }?>                
              </tbody>
            </table>
          </div>
 
          
      </div><!--/row-->
	</div>
</div><!--/.container-->

<?php include('inc/footer.php')?>