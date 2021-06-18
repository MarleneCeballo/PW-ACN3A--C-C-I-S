<?php require_once('../../inc/header.php');?>

<div class="container-fluid">
      
      <?php $perfilMenu = 'Perfiles';
	  
	
	require_once('../../inc/side_bar.php');
	 
	 


        ?>
	  
	  
        
        <div class="col-sm-9 col-md-10 main">
          
          <!--toggle sidebar button-->
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          
		  <h1 class="page-header">
            Perfiles
          </h1>
 

          <h2 class="sub-header">Listado <a href="perfiles_ae.php"><button type="button" class="btn btn-success" title="Agregar">A</button></a></h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th> 
				  <th>Acciones</th>
                </tr>
              </thead>
			  <tbody>
				<?php  	 
					foreach($perfiles->getList() as $perfil){?>
              
						<tr>
						  <td><?php echo $perfil['id'];?></td>
						  <td><?php echo $perfil['nombre'];?></td> 
						  <td>
						      <a href="perfiles_ae.php?edit=<?php echo $perfil['id']?>"><button type="button" class="btn btn-info" title="Modificar">M</button></a>
							  <a href="index.php?del=<?php echo $perfil['id']?>"><button type="button" class="btn btn-danger" title="Borrar">X</button></a>
					      </td>
						</tr>
				    <?php }?>                
              </tbody>
            </table>
          </div>
 
          
      </div><!--/row-->
	</div>
</div><!--/.container-->

<?php include('../../inc/footer.php')?>