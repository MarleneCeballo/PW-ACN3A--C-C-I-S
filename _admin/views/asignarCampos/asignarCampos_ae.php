<?php 
require('inc/header.php');

?> 

<div class="container-fluid">
      
      <?php  $productosMenu = 'Productos';
	    include('inc/side_bar.php');
        if(isset($_GET['editCampos'])){
        $campos = $this -> campos;
        $productoId= $_GET['editCampos'];
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
      <?php  echo "Asignar Campos Dinamicos"; ?>
                   
          </h1>
  
          <div class="col-md-2"></div>
            <form action="productos" method="post" class="col-md-6 from-horizontal">
           <?php  ?>
            <div class="form-group">
                    <label for="type" class="col-sm-2 control-label">Nombre</label>
                    <div class="col-sm-10">
                    <select name="campoid[]" id="campoid" multiple='multiple'>
                            
                               
                            <?php  
                            foreach($campos as $row => $t){         
                              
                                    ?>
								<?php   
                               
									if(isset($campos->type)){
                                        echo($t['id']);
                                        
                                        echo('<option');
                                        // var_dump($t);
										if(intval($t[0]) == $campos -> {'type'}){
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
                    <button type="submit" class="btn btn-default" name="formulario_asignarCampos">Guardar</button>
                    </div>
                </div> 
                <input type="hidden" class="form-control" id="productoid" name="productoid" placeholder="" value="<?php echo isset($productoId)?$productoId:""?>">

            </form>
          </div>
 
          
      </div><!--/row-->
	</div>
</div><!--/.container-->

<?php 


include('inc/footer.php');?>