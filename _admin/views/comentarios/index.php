<?php 
require('./inc/header.php');
?> 

<div class="container-fluid">
      
      <?php $comentariosMenu = 'Comentarios';
	  
	  $comentarios = $this -> comentarios;

	   if(!in_array('user.add',$_SESSION['usuarios']['permisos']['cod'])){ 
				header('Location: index.php');
			}
			
			
	include('inc/side_bar.php');
	 
	
	

        ?>
	  
	  
        
        <div class="col-sm-9 col-md-10 main">
          
          <!--toggle sidebar button-->
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          
		  <h1 class="page-header">
            Comentarios
          </h1>
 

          <h2 class="sub-header">Listado 
	
				<a href="comentarios_ae"><button type="button" class="btn btn-success" title="Agregar">Add</button></a>
		
		  </h2>
		  <div id="myBtnContainer">
		  <button class="btn active" onclick="filterSelection('all')"> Todos</button>
  		  <button class="btn" onclick="filterSelection('activo')"> Activos</button>
  		  <button class="btn" onclick="filterSelection('no')"> No Activos</button>
		  </div>
			  <div class="table-responsive">
				<table class="table table-striped">
				  <thead>
					<tr>
					 <th>#</th>
					  <th>Id_producto</th>
					  <th>Nombre</th>
					  <th>Apellido</th>
					  <th>Comentario</th>
					  <th>Estrellas</th>
					  <th>eMail</th>
					  <th>Activo</th>
					  <th>Acciones</th>
					</tr>
				  </thead>
				  <tbody>
				  <div class="container">
					<?php  	 
						foreach($comentarios as $comentario){
							?>
				  		
							
							<?php if($comentario['aprobado'] == 1){
								echo'<tr class="filterDiv activo">';
								
							}else{
								echo'<tr class="filterDiv no">';
								
							}	?>
							  <td><?php echo $comentario['id'];?></td>
							  <td><?php echo $comentario['id_producto'];?></td>
							  <td><?php echo $comentario['nombre'];?></td>
							  <td><?php echo $comentario['apellido'];?></td>
							  <td><?php echo $comentario['comentario'];?></td>
							  <td><?php echo $comentario['estrellas'];?></td>
							  <td><?php echo $comentario['email'];?></td>
							  <td><?php echo $comentario['aprobado'];?></td>
							  <td>
								  <?php if(in_array('user.edit',$_SESSION['usuarios']['permisos']['cod'])){?>
										<a href="comentarios_ae?editar=<?php echo $comentario['id']?>"><button type="button" class="btn btn-info" title="Modificar">M</button></a>
								  <?php }?>
								   <?php if(in_array('user.del',$_SESSION['usuarios']['permisos']['cod'])){?>
										<a href="comentarios?delete=<?php echo $comentario['id']?>"><button type="button" class="btn btn-danger" title="Borrar">X</button></a>
								<?php echo'</div>';}?>
							  </td>
							</tr>
						<?php }?>     
						         
				  </tbody>
				</table>
			  </div>

          
      </div><!--/row-->
	</div>
</div>
<script src="./script/filter.js"></script>
<?php include('inc/footer.php');?>