<?php require_once('./inc/header.php');?>
<div class="container-fluid">
      
      <?php $categoriasMenu = 'Categorias';
	    require_once('./inc/side_bar.php');

	    $categorias = $this -> categorias;
        if(isset($_GET['edit'])){
            $categorias = $this -> categorias -> get($_GET['edit']); 
           
        } 
      var_dump($categorias);
	?>
	  
	  
        
        <div class="col-sm-9 col-md-10 main">
          
          <!--toggle sidebar button-->
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          
	  <h1 class="page-header">
                <?php  if(isset($_GET['edit'])){
                    echo "Editar Categoria";
                } else { echo "Nueva Categorias";}
                  
                ?>
          </h1>
  
          <div class="col-md-2"></div>
            <form action="categorias" method="post" class="col-md-6 from-horizontal">
                <div class="form-group">
                    <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" value="<?php echo (isset($categorias->nombre)?$categorias->nombre:'');?>">
                    </div>
                </div> 
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                        <label for="activo">
                      
                        <input type="checkbox" name="activo" value="1" <?php if(isset($categorias->activo))if($categorias->activo==1){echo 'checked';}else{echo'';}?>> Activo
                        </label>
                       
                    </div>
                    </div>
                </div>
                 <div>
              
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default" name="formulario_categorias" >Guardar</button>
                    </div>
                </div> 
                <input type="hidden" class="form-control" id="id" name="id" placeholder="" value="<?php echo (isset($categorias->id)?$categorias->id:'');?>">

            </form>
          </div>
 
          
      </div><!--/row-->
	</div>
</div><!--/.container-->

<?php include('./inc/footer.php')?>