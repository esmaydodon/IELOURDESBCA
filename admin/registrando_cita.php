<?php 
include("../func/funciones.php");
require("class.phpmailer.php");
#$idUsuario_p65="Ilcat.org.pe.";
//////////////////
$textfechaguia= strtotime($_POST['fecha_de_digitacion']);
$fecha_de_digitacion =date('Y-m-d  H:i:s',$textfechaguia);
 
//$fecha_nacimiento_usuario_p65_col =strtotime($_POST['fecha_nacimiento_usuario_p65_col']);
//$fecha_nacimiento_usuario_p65_col2 = date("Y-m-d",$fecha_nacimiento_usuario_p65_col); 
/////////////
$idUsuario_p65=quitar($_POST[idUsuario_p65]);
$numeroactual= quitar($_POST[numeroactual]);
$iddocumento_servicio= quitar($_POST[documento]);
$iddocumento= quitar($_POST[iddocumento]);
$iddocente=quitar($_POST[docente]);
$fechadecitacion=quitar($_POST[fecha_registro_citacion_bd]);
$fecha_de_digitacion=quitar($_POST[fecha_de_digitacion]);
$hora=quitar($_POST[hora]);
$detalleDocumento_bd=quitar($_POST[detalleDocumento_bd]);
$iddistritos_ubigeo=quitar($_POST[iddistritos_ubigeo]);
###################para  guardar en bd la consulta 
 
$consulta = "INSERT INTO documento_servicio_usuario_p65(iddocumento_servicio,idUsuario_p65 
,iddocumento ,iddocente ,fechadecitacion,hora,detalleDocumento_bd,iddistritos_ubigeo,fecha_de_digitacion)
 VALUES ('$iddocumento_servicio','$idUsuario_p65','$iddocumento','$iddocente','$fechadecitacion','$hora','$detalleDocumento_bd','$iddistritos_ubigeo','$fecha_de_digitacion')";
echo $consulta;
 $result = dime($consulta)or die(mysql_error());				 
//   echo $consulta;
    
    ###################para  guardar en bd la consulta end <a href='javascript:history.go(-1)'>Atras</a>
////$phpmailer=$_POST[phpmailer];/////////////  
//$email_admin="admin@kuraka.net";
//
//########################################yea
//$mail = new PHPMailer();
//$mail->Host = "localhost";
//$mail->From = $email_admin;// de quien envia
//$mail->FromName = $idUsuario_p65;// idUsuario_p65 de quien Envia (empresa)
//$mail->Subject = $ape_materno_usuario_p65_col;// contenido del correo
//$mail->AddAddress("marlonmartos@hotmail.com","documento de consulta");
//#$mail->AddCC("oscuridadtye@hotmail.com");
//############## ahora cuerpo
//$body  = "Hola <strong>Datos Ingresados</strong><br>".$fecha_de_digitacion;
//$body .= $referencia_usuario_p65_col."<br>";
//$body .= $idUsuario_p65."<br>RESULTADO";
//$body .= $result."<br>";
//$body .= "<br>DNI:".$documento."<br>Direccion"
//.$direccion_usuario_p65_col_usuario_p65_col."<br>
//    <font color='red'>No responder este email</font>";
//$mail->Body = $body;
############# 
$mail->AltBody = "Copia de seguridad perpsonal registrado";
$mail->Send();

########################################yea end
  echo "<script>document.location.href='documentos_enlace.php'</script>";
 

?>