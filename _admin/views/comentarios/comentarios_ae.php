<?php 
require('inc/header.php');

?> 

<div class="container-fluid">
      
      <?php $comentariosMenu = 'Comentarios';
	    include('inc/side_bar.php');
        if(isset($_GET['editar'])){
        $comentarios = $this -> comentarios;
        
        }
       
     
	   if(  !in_array('user.add',$_SESSION['usuarios']['permisos']['cod']) &&		
			!in_array('user.edit',$_SESSION['usuarios']['permisos']['cod']) ){ 
				header('Location: index.php');
			}
	
	
	
	
	?>
	  
	  
        
        <div class="col-sm-9 col-md-10 main">
     
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          
	  <h1 class="page-header">
      <?php  if(isset($_GET['editar'])){
                    echo "Editar Comentario";
                } else { echo "Nuevo Comentario";}
                  
                ?>
                   
          </h1>
  
          <div class="col-md-2"></div>
            <form action="comentarios" method="post" class="col-md-6 from-horizontal">
                <div class="form-group">
                    <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" value="<?php echo isset($comentarios->nombre)?$comentarios->nombre:'';?>">
                    </div>
                </div> 
             
           
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" name="aprobado" value="1" <?php echo (isset($comentarios->aprobado)?(($comentarios->aprobado == 1) ?'checked':''):'');?>> Aprobado
                        </label>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default" name="formulario_comentarios" >Guardar</button>
                    </div>
                </div> 
                <input type="hidden" class="form-control" id="id" name="id" placeholder="" value="<?php echo isset($comentarios->id)?$comentarios->id:'';?>">

            </form>
          </div>
 
          
      </div><!--/row-->
	</div>
</div><!--/.container-->

<?php include('inc/footer.php');?>