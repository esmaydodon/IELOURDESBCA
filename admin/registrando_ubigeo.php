<?php 
include("../func/funciones.php");
require("class.phpmailer.php");
#$nombre_distrito_provincia_bd="Ilcat.org.pe.";
//////////////////
$textfechaguia= strtotime($_POST['fecha']);
$fechaguiaMysql =date('Y-m-d  H:i:s',$textfechaguia); 
//////////////
$nombre_distrito_provincia_bd=quitar($_POST[nombre_distrito_provincia_bd]);
$idubigeos= quitar($_POST[idubigeos]);
$iddistritos_ubigeo= quitar($_POST[iddistritos_ubigeo]);
$estado_distrito_ubigeo_bd=1;
###################para  guardar en bd la consulta
if($idubigeos != "" and $nombre_distrito_provincia_bd != "") 
       {
$consulta = "INSERT INTO distritos_ubigeo(nombre_distrito_provincia_bd,idubigeos,pertenece_ubigeo,estado_distrito_ubigeo_bd) 
 VALUES ('$nombre_distrito_provincia_bd','$idubigeos','$iddistritos_ubigeo',$estado_distrito_ubigeo_bd)";
$result = dime($consulta)or die(mysql_error());				 
//    echo $consulta;
    
    ###################para  guardar en bd la consulta end <a href='javascript:history.go(-1)'>Atras</a>
//$phpmailer=$_POST[phpmailer];/////////////  
$email_admin="admin@kuraka.net";

########################################yea
$mail = new PHPMailer();
$mail->Host = "localhost";
$mail->From = $email_admin;// de quien envia
$mail->FromName = $nombre_distrito_provincia_bd;// nombre_distrito_provincia_bd de quien Envia (empresa)
$mail->Subject = $iddistritos_ubigeo;// contenido del correo
$mail->AddAddress("marlonmartos@hotmail.com"," idubigeos de consulta");
#$mail->AddCC("oscuridadtye@hotmail.com");
############## ahora cuerpo
$body  = "Hola <strong>Datos Ingresados</strong><br>";
$body .= $tipos_usuarios_idtipos_usuarios."<br>";
$body .= $nombre_distrito_provincia_bd."<br>RESULTADO";
$body .= $result."<br>";
$body .= $fechaguiaMysql."<br>DNI:".$idubigeos_contacto."<br>Direccion"
.$direccion_usuario."<br>
    <font color='red'>no responder este email</font>";
$mail->Body = $body;
############## 
$mail->AltBody = "Copia de seguridad perpsonal registrado";
$mail->Send();

########################################yea end
echo "<script>document.location.href='ubigeo.php'</script>";
	}

?>
