<?php 
include("../func/funciones.php");
require("class.phpmailer.php");
#$idUsuario_p65="Ilcat.org.pe.";
$textfechaguia= strtotime($_POST['fecha_prestamo_bd']);
$fecha_prestamo_bd =date('Y-m-d',$textfechaguia);
//$fecha_nacimiento_usuario_p65_col =strtotime($_POST['fecha_nacimiento_usuario_p65_col']);
//$fecha_nacimiento_usuario_p65_col2 = date("Y-m-d",$fecha_nacimiento_usuario_p65_col); 
/////////////
$idequipos_bd=quitar($_POST[idequipos_bd]);
$prestado_equipo_bd=quitar($_POST[prestado_equipo_bd]);
$registrado_por_bd_prestamo=quitar($_POST[idusuarioPotencial]);
$id_usuario=quitar($_POST[docente]);
$hora_prestamo=quitar($_POST[hora_prestamo]);
$detallePrestamo_bd=quitar($_POST[detallePrestamo_bd]);
$iddistritos_ubigeo=quitar($_POST[iddistritos_ubigeo]);
###################para  guardar en bd la consulta 
 
$consulta = "INSERT INTO `prestamo_bd` (`prestado_equipo_bd`, `detalle_prestamo_bd`, `hora_prestamo`, `iddistritos_ubigeo`, "
        . "`fecha_prestamo_bd`, `registrado_por_bd_prestamo`, `idusuarios`, `idequipos_bd`) VALUES "
        . "('$prestado_equipo_bd', '$detallePrestamo_bd', '$hora_prestamo','$iddistritos_ubigeo','$fecha_prestamo_bd', '$registrado_por_bd_prestamo','$id_usuario', '$idequipos_bd')";
//echo $consulta;
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
//############## ahora_prestamo cuerpo
//$body  = "Hola <strong>Datos Ingresados</strong><br>".$fecha_prestamo_bd;
//$body .= $referencia_usuario_p65_col."<br>";
//$body .= $idUsuario_p65."<br>RESULTADO";
//$body .= $result."<br>";
//$body .= "<br>DNI:".$documento."<br>Direccion"
//.$direccion_usuario_p65_col_usuario_p65_col."<br>
//    <font color='red'>No responder este email</font>";
//$mail->Body = $body;
############# 
//$mail->AltBody = "Copia de seguridad perpsonal registrado";
//$mail->Send();

########################################yea end
  echo "<script>document.location.href='equipos.php'</script>";
 

    ?>