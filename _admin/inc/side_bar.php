<div class="row row-offcanvas row-offcanvas-left">
        
         <div class="col-sm-3 col-md-2 sidebar-offcanvas" id="sidebar" role="navigation">
           
            <ul class="nav nav-sidebar">
              
              <li class="<?php echo isset($productsMenu)?'active':''?>"><a href="productos">Productos</a></li>
			  <?php if( in_array('user.add',$_SESSION['usuarios']['permisos']['cod']) ){?>
					<li class="<?php echo isset($userMenu)?'active':''?>"><a href="usuarios">Usuarios</a></li>
			  <?php }?>
			 <li class="<?php echo isset($perfilMenu)?'active':''?>"><a href="perfiles">Perfiles</a></li>
       <li class="<?php echo isset($categoriasMenu)?'active':''?>"><a href="categorias">Categorias</a></li>
       <li class="<?php echo isset($marcasMenu)?'active':''?>"><a href="marcas">Marcas</a></li>
       <li class="<?php echo isset($comentariosMenu)?'active':''?>"><a href="comentarios">Comentarios</a></li>
              <li><a href="?logout">logout</a></li>
            </ul>
           
          
        </div><!--/span-->