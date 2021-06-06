
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Dashboard with Off-canvas Sidebar</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
	</head>
	<body> 

<div class="container-fluid">
      
      <div class="row row-offcanvas row-offcanvas-left">
        
		<div class="col-sm-3 col-md-2 sidebar-offcanvas" id="sidebar" role="navigation">
           
        </div><!--/span-->
        <div class="col-sm-6 col-md-6 main">
          
          <!--toggle sidebar button-->
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          
		  <form action="/Programacion2021/PW-ACN3A-C-C-I-S/_admin/views/perfiles/index.php" method="post" class=" from-horizontal">
                <div class="form-group">
                    <label for="usuario" class="col-sm-2 control-label">Usuario</label>
                     <div class="col-sm-10">
                        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="" value="<?php echo isset($usuario->usuario)?$usuario->usuario:'';?>">
                    </div>
                </div> 
                 <div class="form-group">
                    <label for="calve" class="col-sm-2 control-label">Clave</label>
                     <div class="col-sm-10">
                        <input type="password" class="form-control" id="clave" name="clave" placeholder="">
                    </div>
                </div> 
               
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default" name="login" >Entrar</button>
                    </div>
                </div> 
            </form>
          
      </div><!--/row-->
	</div>
</div><!--/.container-->

<?php include('inc/footer.php')?>