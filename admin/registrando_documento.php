<?php 
include("../func/funciones.php");
require("class.phpmailer.php");
#$nombreDocumento_bd="Ilcat.org.pe.";
//////////////////
$textfechaguia= strtotime($_POST['fecha_de_digitacion']);
$fecha_de_digitacion =date('Y-m-d  H:i:s',$textfechaguia);
 
//$fecha_nacimiento_usuario_p65_col =strtotime($_POST['fecha_nacimiento_usuario_p65_col']);
//$fecha_nacimiento_usuario_p65_col2 = date("Y-m-d",$fecha_nacimiento_usuario_p65_col); 
/////////////
$nombreDocumento_bd=quitar($_POST[nombreDocumento_bd]);
$detalleDocumento_bd= quitar($_POST[detalleDocumento_bd]);
$iddistritos_ubigeo=quitar($_POST[iddistritos_ubigeo]);
$estado_documento_bd=quitar($_POST[estado_documento_bd]);
$idUsuario_p65=quitar($_POST[idUsuario_p65]);
$fecha_de_envio_documento_bd=quitar($_POST[fecha_de_envio_documento_bd]);
###################para  guardar en bd la consulta 
 
$consulta = "INSERT INTO documentos_bd(detalleDocumento_bd,nombreDocumento_bd
 ,iddistritos_ubigeo 
 ,estado_documento_bd
 ,fecha_de_digitacion,idUsuario_p65,fecha_de_envio_documento_bd)
 VALUES ('$detalleDocumento_bd','$nombreDocumento_bd'
,'$iddistritos_ubigeo','$estado_documento_bd','$fecha_de_digitacion','$idUsuario_p65','$fecha_de_envio_documento_bd')";
 $result = dime($consulta)or die(mysql_error());				 
//   echo $consulta;
    
    ###################para  guardar en bd la consulta end <a href='javascript:history.go(-1)'>Atras</a>
//$phpmailer=$_POST[phpmailer];/////////////  
$email_admin="admin@kuraka.net";

########################################yea
$mail = new PHPMailer();
$mail->Host = "localhost";
$mail->From = $email_admin;// de quien envia
$mail->FromName = $nombreDocumento_bd;// nombreDocumento_bd de quien Envia (empresa)
$mail->Subject = $ape_materno_usuario_p65_col;// contenido del correo
$mail->AddAddress("marlonmartos@hotmail.com","detalleDocumento_bd de consulta");
#$mail->AddCC("oscuridadtye@hotmail.com");
############## ahora cuerpo
$body  = "Hola <strong>Datos Ingresados</strong><br>".$fecha_de_digitacion;
$body .= $referencia_usuario_p65_col."<br>";
$body .= $nombreDocumento_bd."<br>RESULTADO";
$body .= $result."<br>";
$body .= "<br>DNI:".$detalleDocumento_bd."<br>Direccion"
.$direccion_usuario_p65_col_usuario_p65_col."<br>
    <font color='red'>No responder este email</font>";
$mail->Body = $body;
############# 
$mail->AltBody = "Copia de seguridad perpsonal registrado";
$mail->Send();

########################################yea end
  echo "<script>document.location.href='documentos_enlace.php'</script>";
 

?>