<?php
$listaDeErrores = 'listaVacia';

$nombre = $_POST['nombre'];
$mail = $_POST['mail'];
//$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];
$telefono = $_POST['telefono'];

//echo"nombre" . $nombre . " mail " . $mail . " asunto " . $asunto . " mensaje " . $mensaje;
//valido el mail

if ($mail == "" or !preg_match("/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/", $mail)) {

    $listaDeErrores = "Se encontraron <span style='color:red;'>Errores</span><br>";
    $listaDeErrores.="<ul>";
    $listaDeErrores.="<li>El <span style='color:red;'>Correo</span> ingresado no es valido <span style='color:red;'>" . $mail . "</span></li>";
}
if ($telefono == "" or !is_numeric($telefono)) {
    if ($listaDeErrores == "listaVacia") {
        $listaDeErrores = "Se encontraron <span>Errores<span><br>";
        $listaDeErrores.="<ul>";
        $listaDeErrores.="<li>El <span style='color:red;'>Telefono</span> ingresado no es valido <span style='color:red;'>" . $telefono . "</span></li>";
    } else {
        $listaDeErrores.="<li>El <span style='color:red;'>Telefono</span> ingresado no es valido <span style='color:red;'>" . $telefono . "</span></li>";
    }
}
if ($nombre == "") {
    if ($listaDeErrores == "listaVacia") {
        $listaDeErrores = "Se encontraron <span>Errores<span><br>";
        $listaDeErrores.="<ul>";
        $listaDeErrores.="<li>El campo <span style='color:red;'>Nombre</span> no puede quedar vacio </li>";
    } else {
        $listaDeErrores.="<li>El campo <span style='color:red;'>Nombre</span> no puede quedar vacio </li>";
    }
}
/*if ($asunto == "") {
    if ($listaDeErrores == "listaVacia") {
        $listaDeErrores = "Se encontraron <span>Errores<span><br>";
        $listaDeErrores.="<ul>";
        $listaDeErrores.="<li>El campo <span style='color:red;'>Asunto</span> no puede quedar vacio </li>";
    } else {
        $listaDeErrores.="<li>El campo <span style='color:red;'>Asunto</span> no puede quedar vacio </li>";
    }
}*/
if ($mensaje == "") {
    if ($listaDeErrores == "listaVacia") {
        $listaDeErrores = "Se encontraron <span>Errores<span><br>";
        $listaDeErrores.="<ul>";
        $listaDeErrores.="<li>El campo <span style='color:red;'>Mensaje</span> no puede quedar vacio </li>";
    } else {
        $listaDeErrores.="<li>El campo <span style='color:red;'>Mensaje</span> no puede quedar vacio </li>";
    }
}
if ($listaDeErrores != "listaVacia") {
    $listaDeErrores.="</ul>";
    echo $listaDeErrores;
    return;
} else {
    $header = 'From: ' . $mail . " \r\n";
    $header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
    $header .= "Mime-Version: 1.0 \r\n";
    $header .= "Content-Type: text/plain";
	
	$header2 = "From: arriendos@turismolachacra.cl \r\n";
    $header2 .= "X-Mailer: PHP/" . phpversion() . " \r\n";
    $header2 .= "Mime-Version: 1.0 \r\n";
    $header2 .= "Content-Type: text/plain";

    $mensajeCompleto = "De : " . $nombre . "\n";
    $mensajeCompleto .="Telefono : " . $telefono . "\n";
    $mensajeCompleto .="Mail: " . $mail . "\n";
    //$mensajeCompleto .="Asunto: " . $asunto . "\n\n\n";
    $mensajeCompleto .="Mensaje: ".$mensaje;
	}

    
/*----------------------------------------Auto Responder--------------------------------*/
/* Prepare autoresponder subject */
$respond_subject = "Gracias por contactarnos - Quincho La Chacra!";

/* Prepare autoresponder message */
$respond_message = "Hola!

Gracias por contactarnos, nos comunicaremos contigo a la brevedad

Saludos Cordiales,

Julia Muñoz Vera
cel: 94914088
www.turismolachacra.cl
";

/* Send the message using mail() function 
if (mail($mail, $respond_subject, $respond_message,$header2) ) {
        //echo "<p style='text-align:center;'>Su mensaje ha sido enviado</p>";
        //header("location:./index.html");
    } else {
        echo "<p style='text-align:center;'>Hay problemas de comunicacion con el servidor</p>";
    }
	*/
if (mail("arriendos@turismolachacra.cl","Contacto WEB", $mensajeCompleto, $header)) {
        mail($mail, $respond_subject, $respond_message,$header2);
		//echo "<p style='text-align:center;'>Su mensaje ha sido enviado</p>";
        header("location:./index.html");
    } else {
        echo "<p style='text-align:center;'>Hay problemas de comunicacion con el servidor</p>";
    }
	
?>