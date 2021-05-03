<?php require_once 'login.php';?>
<ol>
    <li>Conectar a la base</li> 

    <?php
        try {        
		    //$con = new PDO('mysql:host=localhost;dbname=test;port=3306','root', '');
		    //$con = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
            $con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);
            print "Conexión exitosa!";
        }
        catch (PDOException $e) {
            print "¡Error!: " . $e->getMessage();
            die();
        }
        
    ?>

     <!-- <li>SQL - Insert</li>
    
    <?php 
        $sql = "  INSERT INTO categorias(id,nombre) VALUES (1,'Hombre');   
         INSERT INTO categorias(id,nombre) VALUES (2,'Mujer');
         INSERT INTO categorias(id,nombre) VALUES (3,'Niñes');
        
         INSERT INTO Comentarios(fecha,id_producto,nombre,apellido,comentario,estrellas,email) VALUES ('01-12-2020 18:38:26',2,'prueba 2','p2','p2',2,'prueba@gmail.com');
      
         INSERT INTO Marcas(id,nombre) VALUES (1,'Adidas');
         INSERT INTO Marcas(id,nombre) VALUES (2,'Nike');
         INSERT INTO Marcas(id,nombre) VALUES (3,'Converse');
         INSERT INTO Marcas(id,nombre) VALUES (4,'DC');
         INSERT INTO Marcas(id,nombre) VALUES (5,'Vans');
         
         INSERT INTO zapatillas(id,nombre,descripcion,precio,id_marca,modelo,id_genero,imagenmini,imagengrande,nuevo) VALUES (1,'Zapatilla Rosa Adidas Entrap',NULL,6799,1,'Entrap',2,'inc/img/adidasmujer/adidas-rosa-entrap-mini.jpg','inc/img/adidasmujer/adidas-rosa-entrap-grande.jpg','si');
INSERT INTO zapatillas(id,nombre,descripcion,precio,id_marca,modelo,id_genero,imagenmini,imagengrande,nuevo) VALUES (2,'Zapatilla Negra Adidas Entrap',NULL,6369,1,'Entrap',2,'inc/img/adidasmujer/adidas-negra-entrap-mini.jpg','inc/img/adidasmujer/adidas-negra-entrap-grande.jpg','no');
INSERT INTO zapatillas(id,nombre,descripcion,precio,id_marca,modelo,id_genero,imagenmini,imagengrande,nuevo) VALUES (3,'Zapatilla Rosa Adidas Runfalcon',NULL,5299,1,'Runfalcon',2,'inc/img/adidasmujer/adidas-rosa-runfalcon-mini.jpg','inc/img/adidasmujer/adidas-rosa-runfalcon-grande.jpg','no');
INSERT INTO zapatillas(id,nombre,descripcion,precio,id_marca,modelo,id_genero,imagenmini,imagengrande,nuevo) VALUES (4,'Zapatilla Blanca Adidas Superstar',NULL,8999,1,'Superstar',2,'inc/img/adidasmujer/adidas-blanca-superstar-mini.jpg','inc/img/adidasmujer/adidas-blanca-superstar-grande.jpg','no');
INSERT INTO zapatillas(id,nombre,descripcion,precio,id_marca,modelo,id_genero,imagenmini,imagengrande,nuevo) VALUES (5,'Zapatilla Negra Adidas Advantage Bold',NULL,5299,1,'Advantage Bold',1,'inc/img/adidashombre/adidas-negra-advantagebold-mini.jpg','inc/img/adidashombre/adidas-negra-advantagebold-grande.jpg','si');
INSERT INTO zapatillas(id,nombre,descripcion,precio,id_marca,modelo,id_genero,imagenmini,imagengrande,nuevo) VALUES (6,'Zapatilla Naranja Adidas Fabela Rise',NULL,9199,1,'Fabela Rise',1,'inc/img/nikehombre/nike-roja-airmaxbellatr2-mini.jpg','inc/img/nikehombre/nike-negra-airmaxbellatr2y-grande.jpg','no');
INSERT INTO zapatillas(id,nombre,descripcion,precio,id_marca,modelo,id_genero,imagenmini,imagengrande,nuevo) VALUES (7,'Zapatilla Azul Adidas Astrarun',NULL,6499,1,'Astrarun',1,'inc/img/adidashombre/adidas-azul-astrarun-mini.jpg','inc/img/adidashombre/adidas-azul-astrarun-grande.jpg','no');
INSERT INTO zapatillas(id,nombre,descripcion,precio,id_marca,modelo,id_genero,imagenmini,imagengrande,nuevo) VALUES (8,'Zapatilla Blanca Adidas Solar Trainer',NULL,6299,1,'Solar Trainer',1,'inc/img/adidashombre/adidas-blanca-solartrainer-mini.jpg','inc/img/adidashombre/adidas-blanca-solartrainer-grande.jpg','no');
INSERT INTO zapatillas(id,nombre,descripcion,precio,id_marca,modelo,id_genero,imagenmini,imagengrande,nuevo) VALUES (9,'Zapatilla Blanca Adidas Grand Court K',NULL,4999,1,'Court K',3,'inc/img/adidasmujer/adidas-grandcourt-mini.jpg','inc/img/adidasmujer/adidas-grandcourt-grande.jpg','no');
INSERT INTO zapatillas(id,nombre,descripcion,precio,id_marca,modelo,id_genero,imagenmini,imagengrande,nuevo) VALUES (10,'Zapatilla Blanca Adidas Originals Superstar',NULL,5499,1,'Superstar',3,'inc/img/adidasniño/adidas-blanca-superestar-mini.jpg','inc/img/adidasniño/adidas-blanca-superestar-grande.jpg','si');
INSERT INTO zapatillas(id,nombre,descripcion,precio,id_marca,modelo,id_genero,imagenmini,imagengrande,nuevo) VALUES (11,'Zapatilla Rosa Nike Air Max Command',NULL,11599,2,'Air Max Command',2,'inc/img/nikemujer/nike-rosa-airmaxcommand-mini.jpg','inc/img/nikemujer/nike-rosa-airmaxcommand-grande.jpg','no');
INSERT INTO zapatillas(id,nombre,descripcion,precio,id_marca,modelo,id_genero,imagenmini,imagengrande,nuevo) VALUES (12,'Zapatilla Blanca Nike RENEW RUN',NULL,9299,2,'Renew Run',2,'inc/img/nikemujer/nike-blanca-renewrun-mini.jpg','inc/img/nikemujer/nike-blanca-renewrun-grande.jpg','si');
INSERT INTO zapatillas(id,nombre,descripcion,precio,id_marca,modelo,id_genero,imagenmini,imagengrande,nuevo) VALUES (13,'Zapatilla Gris Nike Md Runner 2 Se',NULL,5039,2,'Md Runner 2 Se',2,'inc/img/nikemujer/nike-gris-mdrunner2se-mini.jpg','inc/img/nikemujer/nike-gris-mdrunner2se-grande.jpg','no');
INSERT INTO zapatillas(id,nombre,descripcion,precio,id_marca,modelo,id_genero,imagenmini,imagengrande,nuevo) VALUES (14,'Zapatilla Negra Nike AMIXA',NULL,8399,2,'Amixa',2,'inc/img/nikemujer/nike-negra-amixa-mini.jpg','inc/img/nikemujer/nike-negra-amixa-grande.jpg','si');
INSERT INTO zapatillas(id,nombre,descripcion,precio,id_marca,modelo,id_genero,imagenmini,imagengrande,nuevo) VALUES (15,'Zapatilla Azul Nike Zoom Rival Fly',NULL,5287,2,'Rival Fly',2,'inc/img/nikehombre/nike-azul-rivalfly-grandemini.jpg','inc/img/nikehombre/nike-azul-rivalfly-grande.jpg','no');
INSERT INTO zapatillas(id,nombre,descripcion,precio,id_marca,modelo,id_genero,imagenmini,imagengrande,nuevo) VALUES (16,'Zapatilla Negra Nike AIR MAX BELLA TR 2',NULL,8699,2,'Air max Bella TR 2',2,'inc/img/nikehombre/nike-roja-airmaxbellatr2-mini.jpg','inc/img/nikehombre/nike-negra-airmaxbellatr2y-grande.jpg','no');
INSERT INTO zapatillas(id,nombre,descripcion,precio,id_marca,modelo,id_genero,imagenmini,imagengrande,nuevo) VALUES (17,'Zapatilla Bordó Nike Air Max Axis',NULL,7969,2,'Air Max Axis',2,'inc/img/nikehombre/nike-negraroja-airmaxaxis-mini.jpg','inc/img/nikehombre/nike-negraroja-airmaxaxis-grande.jpg','no');
INSERT INTO zapatillas(id,nombre,descripcion,precio,id_marca,modelo,id_genero,imagenmini,imagengrande,nuevo) VALUES (18,'Zapatilla Negra Nike Renew Lucent',NULL,8389,2,'Renew Lucent',2,'inc/img/nikehombre/nike-blancanegra-renewlucent-mini.jpg','inc/img/nikehombre/nike-blancanegra-renewlucent-grande.jpg','no');
INSERT INTO zapatillas(id,nombre,descripcion,precio,id_marca,modelo,id_genero,imagenmini,imagengrande,nuevo) VALUES (19,'Zapatilla Negra Converse Chuck Taylor All Star Monochro',NULL,5199,3,'Monochro',2,'inc/img/conversemujer/converse-negra-taylor-mini.jpg','inc/img/conversemujer/converse-negra-taylor-grande.jpg','no');
INSERT INTO zapatillas(id,nombre,descripcion,precio,id_marca,modelo,id_genero,imagenmini,imagengrande,nuevo) VALUES (20,'Zapatilla Roja Converse Chuck Taylor All Star Core OX',NULL,4995,3,'Core Ox',2,'inc/img/conversemujer/converse-roja-taylor-mini.jpg','inc/img/conversemujer/converse-roja-taylor-grande.jpg','si');
INSERT INTO zapatillas(id,nombre,descripcion,precio,id_marca,modelo,id_genero,imagenmini,imagengrande,nuevo) VALUES (21,'Zapatilla Blanca Converse Chuck Taylor All Star Metallic',NULL,3369,3,'Core Ox',2,'inc/img/conversemujer/converse-blanca-taylor-mini.jpg','inc/img/conversemujer/converse-blanca-taylor-grande.jpg','no');
INSERT INTO zapatillas(id,nombre,descripcion,precio,id_marca,modelo,id_genero,imagenmini,imagengrande,nuevo) VALUES (22,'Zapatilla Azul Converse Stoke Ox',NULL,4089,3,'Stoke Ox',1,'inc/img/conversehombre/converse-azul-stoke-mini.jpg','inc/img/conversehombre/converse-azul-stoke-grande.jpg','no');
INSERT INTO zapatillas(id,nombre,descripcion,precio,id_marca,modelo,id_genero,imagenmini,imagengrande,nuevo) VALUES (23,'Zapatilla Negra Converse RIVAL OX',NULL,6399,3,'Rival Ox',1,'inc/img/conversehombre/converse-negra-rival-mini.jpg','inc/img/conversehombre/converse-negra-rival-grande.jpg','no');
INSERT INTO zapatillas(id,nombre,descripcion,precio,id_marca,modelo,id_genero,imagenmini,imagengrande,nuevo) VALUES (24,'Zapatilla Verde Converse Stoke Ox Faded',NULL,4039,3,'Stoke Od Faded',2,'inc/img/conversemujer/converse-verde-stoke-ok-faded-mini.jpg','inc/img/conversemujer/converse-verde-stoke-ok-faded-grande.jpg','no');
INSERT INTO zapatillas(id,nombre,descripcion,precio,id_marca,modelo,id_genero,imagenmini,imagengrande,nuevo) VALUES (25,'Zapatilla Verde Converse CTAS LIFT OX',NULL,6199,3,'Lift Ox',2,'inc/img/conversehombre/converse-verde-lift-mini.jpg','inc/img/conversehombre/converse-verde-lift-grande.jpg','si');
INSERT INTO zapatillas(id,nombre,descripcion,precio,id_marca,modelo,id_genero,imagenmini,imagengrande,nuevo) VALUES (26,'Zapatilla Bordó Converse Chuck Taylor All Star Hi Maroo',NULL,4999,3,'Hi Maroo',2,'inc/img/conversemujer/converse-bordo-taylor-mini.jpg','inc/img/conversemujer/converse-bordo-taylor-grande.jpg','no');
INSERT INTO zapatillas(id,nombre,descripcion,precio,id_marca,modelo,id_genero,imagenmini,imagengrande,nuevo) VALUES (27,'Zapatilla Tribeka Dc Se',NULL,8299,4,'Tribeka',2,'inc/img/dcsshoesmujer/dcshoes-rosa-tribeka-mini.jpg','inc/img/dcsshoesmujer/dcshoes-rosa-tribeka-grande.jpg','si');
INSERT INTO zapatillas(id,nombre,descripcion,precio,id_marca,modelo,id_genero,imagenmini,imagengrande,nuevo) VALUES (28,'Zapatilla DC Heathrow Ia',NULL,6399,4,'Heathrow Ia',2,'inc/img/dcsshoesmujer/dcshoes-gris-heathrow-mini.jpg','inc/img/dcsshoesmujer/dcshoes-gris-heathrow-grande.jpg','no');
INSERT INTO zapatillas(id,nombre,descripcion,precio,id_marca,modelo,id_genero,imagenmini,imagengrande,nuevo) VALUES (29,'Zapatilla Tribeka Dc Se Dorada',NULL,8299,4,'Tribeka',2,'inc/img/dcsshoesmujer/dcshoes-rosa-oro-tribeka-ia-mini.jpg','inc/img/dcsshoesmujer/dcshoes-rosa-oro-tribeka-ia-grande.jpg','no');
INSERT INTO zapatillas(id,nombre,descripcion,precio,id_marca,modelo,id_genero,imagenmini,imagengrande,nuevo) VALUES (30,'Zapatilla DC Heathrow',NULL,8299,4,'Heathrow',2,'inc/img/dcsshoesmujer/dcshoes-roja-heathrow-ia-mini.jpg','inc/img/dcsshoesmujer/dcshoes-roja-heathrow-ia-grande.jpg','si');
INSERT INTO zapatillas(id,nombre,descripcion,precio,id_marca,modelo,id_genero,imagenmini,imagengrande,nuevo) VALUES (31,'Zapatilla DC Heathrow SE',NULL,7299,4,'Heathrow',3,'inc/img/dcshoesniños/dcshoes-gris-heathrow-se-mini.jpg','inc/img/dcshoesniños/dcshoes-gris-heathrow-se-grande.jpg','no');
INSERT INTO zapatillas(id,nombre,descripcion,precio,id_marca,modelo,id_genero,imagenmini,imagengrande,nuevo) VALUES (32,'Zapatilla DC Trase Tx',NULL,5799,4,'Trase Tx',3,'inc/img/dcshoesniños/dcshoes-blanca-trase-tx-mini.jpg','inc/img/dcshoesniños/dcshoes-blanca-trase-tx-grande.jpg','no');
INSERT INTO zapatillas(id,nombre,descripcion,precio,id_marca,modelo,id_genero,imagenmini,imagengrande,nuevo) VALUES (33,'Zapatilla DC Trase Tx Se',NULL,6999,4,'Trase Tx Se',3,'inc/img/dcshoesniños/dcshoes-azul-trase-mini.jpg','inc/img/dcshoesniños/dcshoes-azul-trase-grande.jpg','no');
INSERT INTO zapatillas(id,nombre,descripcion,precio,id_marca,modelo,id_genero,imagenmini,imagengrande,nuevo) VALUES (34,'Zapatilla DC Heathrow',NULL,6999,4,'Trase Tx',3,'inc/img/dcshoesniños/dcshoes-negra-heathrow-mini.jpg','inc/img/dcshoesniños/dcshoes-negra-heathrow-grande.jpg','si');
INSERT INTO zapatillas(id,nombre,descripcion,precio,id_marca,modelo,id_genero,imagenmini,imagengrande,nuevo) VALUES (35,'Zapatilla U Vans Sport',NULL,6900,5,'Sport',1,'inc/img/vanshombre/vans-azul-sport-mini.jpg','inc/img/vanshombre/vans-azul-sport-grande.jpg','no');
INSERT INTO zapatillas(id,nombre,descripcion,precio,id_marca,modelo,id_genero,imagenmini,imagengrande,nuevo) VALUES (36,'Zapatilla U Vans Authentic',NULL,4900,5,'Authentic',1,'inc/img/vanshombre/vans-negra-authentic-mini.jpg','inc/img/vanshombre/vans-negra-authentic-grande.jpg','si');
INSERT INTO zapatillas(id,nombre,descripcion,precio,id_marca,modelo,id_genero,imagenmini,imagengrande,nuevo) VALUES (37,'Zapatilla U Vans Doheny',NULL,5100,5,'Doheny',1,'inc/img/vanshombre/vans-negra-doheny-mini.jpg','inc/img/vanshombre/vans-negra-doheny-grande.jpg','no');
INSERT INTO zapatillas(id,nombre,descripcion,precio,id_marca,modelo,id_genero,imagenmini,imagengrande,nuevo) VALUES (38,'Zapatilla U Vans Sk8-Hi',NULL,7700,5,'Sk8-Hi',1,'inc/img/vanshombre/vans-negra-sk8-mini.jpg','inc/img/vanshombre/vans-negra-sk8-grande.jpg','no');
INSERT INTO zapatillas(id,nombre,descripcion,precio,id_marca,modelo,id_genero,imagenmini,imagengrande,nuevo) VALUES (39,'Zapatilla U Vans Sk8-Hi',NULL,7700,5,'Sk8-Hi',1,'inc/img/vansmujer/vans-amarilla-sk8-mini.jpg','inc/img/vansmujer/vans-amarilla-sk8-grande.jpg','si');
INSERT INTO zapatillas(id,nombre,descripcion,precio,id_marca,modelo,id_genero,imagenmini,imagengrande,nuevo) VALUES (40,'Zapatilla U Vans Authentic Elastic Lace',NULL,1200,5,'Authentic Elastic Lace',3,'inc/img/vansmujer/vans-roja-authentic-elastic-mini.jpg','inc/img/vansmujer/vans-roja-authentic-elastic-grande.jpg','si');
INSERT INTO zapatillas(id,nombre,descripcion,precio,id_marca,modelo,id_genero,imagenmini,imagengrande,nuevo) VALUES (41,'Zapatilla U Vans T Classic Slip-on',NULL,1800,5,'Classic Slip-on',3,'inc/img/vansmujer/vans-classic-slip-mini.jpg','inc/img/vansmujer/vans-classic-slip-grande.jpg','no');
INSERT INTO zapatillas(id,nombre,descripcion,precio,id_marca,modelo,id_genero,imagenmini,imagengrande,nuevo) VALUES (42,'Zapatilla U Vans T Sk8-Hi Zip',NULL,2200,5,'T Sk8-Hi Zip',3,'inc/img/vansmujer/vans-bordo-sk8-mini.jpg','inc/img/vansmujer/vans-bordo-sk8-grande.jpg','si');

         ";

		
        $count = $con->exec($sql);
	   if($count > 0 ) 
			print($count." Filas afectadas");
	   else 
			print('ERROR');
             
      
	  
   
        

?>
            
    
            
   

    <li>Cerrar Conexión</li>

    <?php 
            $con =null;
    ?>
</ol>  