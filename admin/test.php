<?php

$nombre = $_POST["name"];
$email = $_POST["email"];
$phoneNo = $_POST["phoneNo"];
$selectOption = $_POST["selectOption"];
$mensaje = $_POST["textarea"];
$email_contacto="contactoaremail.com";
echo $email;

require("PHPMailer/class.phpmailer.php");

require("PHPMailer/class.phpmailer.php");
$mail = new PHPMailer();
$mail->Host = "localhost";  

$mail->From = "webmaster@incawasi.org";// de quien envia
$mail->FromName = "Remitente".$nombre;// nombre de quien Envia (webmaster)
$mail->Subject = "Necesita más información del servicio";// contenido del correo
$mail->AddAddress("atencionalcliente@transmieirl.com.pe","Marlon MArtos Quiroz inca2");
$mail->AddAddress("marlonmartos@hotmail.com","marlon inca02");
$mail->AddCC("marlon@kuraka.net");
$mail->AddBCC("diosgoogle@hotmail.com");
/****/
$body  = "Hola <strong>amigo</strong><br>";
$body .= $mensaje."<i>comentarios<i>.<br><br>";
$body .= $nombre."<br>".$email_contacto."<br><font color='red'>Saludos</font>";
$mail->Body = $body;
$mail->AltBody = "Hola amigo\nprobando PHPMailer\n\nSaludos";
$mail->AddAttachment("files/demo.zip", "demo.zip");
$mail->Send();

/***/
if($mail->send() == false){
  echo "No se pudo enviar email";
  echo $mail->ErrorInfo;
 } else {
   echo "Mensaje enviado";
}

?>