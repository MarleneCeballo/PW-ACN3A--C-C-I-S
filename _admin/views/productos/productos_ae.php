<?php require_once('./inc/header.php');?>
<div class="container-fluid">
      
      <?php $productosMenu = 'Productos';
	    require_once('./inc/side_bar.php');

	    $productos = $this -> productos;
        if(isset($_GET['edit'])){
            $productos = $productos ->  get($_GET['edit']); 
           
        } 
      var_dump($productos);
	?>
	  
	  
        
        <div class="col-sm-9 col-md-10 main">
          
          <!--toggle sidebar button-->
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          
	  <h1 class="page-header">
                <?php  if(isset($_GET['edit'])){
                    echo "Editar Producto";
                } else { echo "Nuevo Producto";}
                  
                ?>
          </h1>
  
          <div class="col-md-2"></div>
            <form action="productos" method="post" class="col-md-6 from-horizontal">
                <div class="form-group">
                    <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" value="<?php echo (isset($productos->nombre)?$productos->nombre:'');?>">
                    </div>
                </div> 
                <div class="form-group">
                    <label for="precio" class="col-sm-2 control-label">Precio</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="precio" name="precio" placeholder="" value="<?php echo (isset($productos->precio)?$productos->precio:'');?>">
                    </div>
                </div> 
                <div class="form-group">
                    <label for="descripcion" class="col-sm-2 control-label">Descripcion</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="" value="<?php echo (isset($productos->descripcion)?$productos->descripcion:'');?>">
                    </div>
                </div> 
                <div class="form-group">
                    <label for="modelo" class="col-sm-2 control-label">Modelo</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="modelo" name="modelo" placeholder="" value="<?php echo (isset($productos->modelo)?$productos->modelo:'');?>">
                    </div>
                </div> 
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                        <label for="activo">
                        <input type="checkbox" name="activo" value="1" <?php if(isset($productos->activo))if($productos->activo==1){echo 'checked';}else{echo'';}?>> Activo
                        </label>
                       
                    </div>
                    </div>
                </div>
                 <div>
              
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default" name="formulario_productos" >Guardar</button>
                    </div>
                </div> 
                <input type="hidden" class="form-control" id="id" name="id" placeholder="" value="<?php echo (isset($productos->id)?$productos->id:'');?>">

            </form>
          </div>
 
          
      </div><!--/row-->
	</div>
</div><!--/.container-->

<?php include('./inc/footer.php')?>