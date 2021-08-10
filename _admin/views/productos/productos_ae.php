<?php require_once('./inc/header.php');?>
<div class="container-fluid">
      
      <?php $productosMenu = 'Productos';
	    require_once('./inc/side_bar.php');
        $marcas = $this -> marcas;
	    $productos = $this -> productos;
        $categorias = $this -> categorias;
        if(isset($_GET['edit'])){
            $productos = $productos ->  get($_GET['edit']); 
            $comentarios = $this -> comentarios;
            $campos = $this -> campos;
        } 
        
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

                <div class="form-group">
                    <label for="imagenmini" class="col-sm-2 control-label">Imagen Mini</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="imagenmini" name="imagenmini" placeholder="" value="<?php echo (isset($productos->imagenmini)?$productos->imagenmini:'');?>">
                    </div>
                </div> 
                <div class="form-group">
                <div class="form-group">
                    <label for="imagengrande" class="col-sm-2 control-label">Imagen Grande</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="imagengrande" name="imagengrande" placeholder="" value="<?php echo (isset($productos->imagengrande)?$productos->imagengrande:'');?>">
                    </div>
                </div> 
                   
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                        <label for="nuevo">
                        <input type="checkbox" name="activo" value="1" <?php if(isset($productos->nuevo))if($productos->nuevo==1){echo 'checked';}else{echo'';}?>> Nuevo
                        </label>
                       
                    </div>
                    </div>
                </div>
                <div class="form-group">
                
                    <label for="id_marca" class="col-sm-2 control-label">Marca</label>
                    <div class="col-sm-10">
                        <select name="id_marca" id="id_marca">
                            <?php  
                                
                            foreach($marcas as $row => $t){         
                              
                                    ?>
								<?php   
                               
									if(isset($productos->id_marca)){
                                        echo($t['id']);
                                        
                                        echo('<option');
                                        // var_dump($t);
										if(intval($t[0]) == $productos -> {'id_marca'}){
                                            echo ' selected="selected" ';
                                            echo' value='.$t['id'].'>';
                                            echo $t['nombre'];
										}else{
                                            echo' value='.$t['id'].'>';
                                            echo $t['nombre'];
                                        }
									}else{
                                        echo($t['id']);
                                        echo('<option');
                                        echo' value='.$t['id'].'>';
                                        echo $t['nombre'];
                                    }
								
								?></option>
                            <?php }?>
                        </select>
                    </div>
                </div> 
                <div class="form-group">
                
                <label for="id_genero" class="col-sm-2 control-label">Categoria</label>
                <div class="col-sm-10">
                    <select name="id_genero" id="id_genero">
                        <?php  
                            
                        foreach($categorias as $row => $t){         
                          
                                ?>
                            <?php   
                           
                                if(isset($productos->id_genero)){
                                    echo($t['id']);
                                    
                                    echo('<option');
                                    // var_dump($t);
                                    if(intval($t[0]) == $productos -> {'id_genero'}){
                                        echo ' selected="selected" ';
                                        echo' value='.$t['id'].'>';
                                        echo $t['nombre'];
                                    }else{
                                        echo' value='.$t['id'].'>';
                                        echo $t['nombre'];
                                    }
                                }else{
                                    echo($t['id']);
                                    echo('<option');
                                    echo' value='.$t['id'].'>';
                                    echo $t['nombre'];
                                }
                            
                            ?></option>
                        <?php }?>
                    </select>
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
                
              
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default" name="formulario_productos" >Guardar</button>
                    </div>
                </div> 
                <input type="hidden" class="form-control" id="id" name="id" placeholder="" value="<?php echo (isset($productos->id)?$productos->id:'');?>">

            </form>
            <?php  if(isset($_GET['edit'])){
                echo ('<div class="form-group">');
                echo  ('<label for="tipo" class="col-sm-2 control-label">Comentarios</label>');
                echo  (' <div class="col-sm-10">');?>
                         <?php  if($comentarios != null){
                        foreach($comentarios as $t){?>
                         <pre><?php echo'Nombre: ';echo $t['nombre'];echo '<br>'; 
                         echo'Estrellas: ';echo $t['estrellas'];echo '<br>'; 
                         echo'Comentario: ';echo $t['comentario']; ?>
                         </pre> 
                         <?php }}?>
               <?php      echo ( '</div></div> </div>');}?> 
               
               <?php  if(isset($_GET['edit'])){
                echo ('<div class="form-group">');
                echo  ('<label for="tipo" class="col-sm-2 control-label">Campos</label>');
                echo  (' <div class="col-sm-10">');?>
                         <?php  if($campos != null){
                        foreach($campos as $t){?>
                         <pre><?php echo'Nombre: ';echo $t['nombre'];echo '<br>'; 
                                    echo'Tipo: ';echo $t['type'];echo '<br>'; 

                         ?>
                         </pre> 
                         <?php }}?>
               <?php      echo ( '</div></div> </div>');}?> 
                   
          
      </div><!--/row-->
	</div>
</div><!--/.container-->

<?php include('./inc/footer.php')?>