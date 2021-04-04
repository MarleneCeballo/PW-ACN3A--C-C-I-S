<?php
$titulo = 'World Shoes - Mensaje Enviado';
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 

require_once ('PHPMailer-master\src\PHPMailer.php');
require_once ('PHPMailer-master\src\Exception.php');
require_once ('PHPMailer-master\src\SMTP.php');

//Crear una instancia de PHPMailer
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug  = 0;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth= true;
$mail->Username = "kevin.carballal@davinci.edu.ar";
$mail->Password = '*';
$mail->SetFrom('kevin.carballal@davinci.edu.ar', 'Kevin Carballal');
$mail->addAddress($_POST["mail"]);
$mail->isHTML(true);

$sector = $_POST['area'];

if($sector == '1'){
	$sector = 'Recursos Humanos';
	$mail->addBCC('kevin.carballal@davinci.edu.ar');
}else if ($sector == '2'){
	$sector = 'IT';
	$mail->addBCC('kevin.carballal@davinci.edu.ar');
}else if ($sector == '3'){
	$sector = 'Cobranzas';
	$mail->addBCC('kevin.carballal@davinci.edu.ar');
}else if ($sector == '4'){
	$sector = 'Marketing';
	$mail->addBCC('kevin.carballal@davinci.edu.ar');
}else if ($sector == '5'){
    $sector = 'Soporte';
	$mail->addBCC('kevin.carballal@davinci.edu.ar');
}else {
    $sector = 'Contabilidad';
	$mail->addBCC('kevin.carballal@davinci.edu.ar');
}

$mail->Subject='Formulario de contacto - World Shoes';
$mail->Body='<h1 align=left>Sus comentarios fueron recibidos con exito por World Shoes</h1> ' .
'<h3><ul align=left>' . 
 '<p>Nombre: '. $_POST['nombre']. '</p>' .
 '<br><p>Apellido: '. $_POST['apellido'] . '</p>'.
 '<br><p>Mail: '. $_POST['mail'] . '</p>'.
 '<br><p>Telefono: '.$_POST['telefono']. '</p>' .
 '<br><p>Area que desea contactar : '. $sector . '</p>' .
 '</ul></h3>'.
 '<br><h2>Su mensaje fue: </h2>' .
 '<br><h4>' . $_POST["comentario"] . '</h4>';

 if(!$mail->Send()) {
    echo "Error: " . $mail->ErrorInfo;
  } else {
    echo "Enviado!";
  }
?>

<body>
	<div class="container">
		<div>
			<h1 class="text-center">Mensaje enviado con exito</h1>
		</div>
	</div>
</body>
