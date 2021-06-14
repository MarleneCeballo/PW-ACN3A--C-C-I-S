<?php require_once('../../inc/header.php');?>

<div class="container-fluid">
      
      <?php $categoriasMenu = 'Categorias';
	  require_once('../../inc/side_bar.php');
	$categorias = new Categoria($con);
	
	 
	 
	if(isset($_POST['formulario_categorias'])){ 
	    if($_POST['id'] > 0){
                $categorias->edit($_POST); 
               
	    }else{
			
                $categorias->save($_POST); 
        }
		
		header('Location: index.php');
	}	
	 
	if(isset($_GET['del'])){
			$resp = $categorias->del($_GET['del']) 	;
            if($resp == 1){
				header('Location: index.php');	
			}
			echo '<script>alert("'.$resp.'");</script>';

	}
	

        ?>
	  
	  
        
        <div class="col-sm-9 col-md-10 main">
          
          <!--toggle sidebar button-->
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          
		  <h1 class="page-header">
           Categorias
          </h1>
 

          <h2 class="sub-header">Listado<a href="perfiles_ae.php"><button type="button" class="btn btn-success" title="Agregar">Add</button></a></h2>
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
					foreach($categorias->getList() as $categoria){?>
              
						<tr>
						  <td><?php echo $categoria['id'];?></td>
						  <td><?php echo $categoria['nombre'];?></td> 
						  <td>
						      <a href="perfiles_ae.php?edit=<?php echo $categoria['id']?>"><button type="button" class="btn btn-info" title="Modificar">M</button></a>
							  <a href="index.php?del=<?php echo $categoria['id']?>"><button type="button" class="btn btn-danger" title="Borrar">X</button></a>
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