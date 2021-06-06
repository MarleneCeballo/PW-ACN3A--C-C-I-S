<div class="row row-offcanvas row-offcanvas-left">
        
         <div class="col-sm-3 col-md-2 sidebar-offcanvas" id="sidebar" role="navigation">
           
            <ul class="nav nav-sidebar">
              <li><a href="index.php">Home</a></li>
              <li class="<?php echo isset($productsMenu)?'active':''?>"><a href="productos.php">Productos</a></li>
			  <?php if( in_array('user',$_SESSION['usuario']['permisos']) ){?>
					<li class="<?php echo isset($userMenu)?'active':''?>"><a href="usuarios.php">Usuarios</a></li>
			  <?php }?>
			 <li class="<?php echo isset($perfilMenu)?'active':''?>"><a href="index.php">Perfiles</a></li>
              <li><a href="?logout">logout</a></li>
            </ul>
           
          
        </div><!--/span-->