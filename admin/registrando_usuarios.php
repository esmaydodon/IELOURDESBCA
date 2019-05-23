<?php 
include("../func/funciones.php");
require("class.phpmailer.php");
#$nombre_usuario="Ilcat.org.pe.";
//////////////////
$textfechaguia= strtotime($_POST['fecha']);
$fechaguiaMysql =date('Y-m-d  H:i:s',$textfechaguia); 
//////////////
   $nombre_usuario=quitar($_POST[nombre_usuario]);
$dni_suario= quitar($_POST[dni_suario]);
$email_usuario= quitar($_POST[email_usuario]);
$direccion_usuario= quitar($_POST[direccion_usuario]);
$telefono_usuario=quitar($_POST[telefono_usuario]);
$sexo=quitar($_POST[sexo]);
$tipos_usuarios_idtipos_usuarios=quitar($_POST[tipoUsuario]);
$nick_usuario=quitar($_POST[nick_usuario]);
$pass_usuario=quitar($_POST[pass_usuario]);
$estado_usuario=quitar($_POST[estado_usuario]);
$idCoordinador=quitar($_POST[idCoordinador]);
###################para  guardar en bd la consulta
if($dni_suario != "" and $nombre_usuario != "" and $tipos_usuarios_idtipos_usuarios != ""  ) 
       {
$consulta = "INSERT INTO usuarios(nick_usuario,pass_usuario,nombre_usuario,email_usuario,telefono_usuario,
direccion_usuario,tipos_usuarios_idtipos_usuarios,sexo,celular_usuario,dni_suario,estado_usuario,idCoordinador) 
 VALUES ('$nick_usuario','$pass_usuario','$nombre_usuario','$email_usuario','$telefono_usuario','$direccion_usuario'
     ,'$tipos_usuarios_idtipos_usuarios','$sexo','$celular_usuario','$dni_suario','$estado_usuario','$idCoordinador')";
$result = dime($consulta)or die(mysql_error());				 
//    echo $consulta;
    
    ###################para  guardar en bd la consulta end <a href='javascript:history.go(-1)'>Atras</a>
//$phpmailer=$_POST[phpmailer];/////////////  
$email_admin="admin@kuraka.net";

########################################yea
$mail = new PHPMailer();
$mail->Host = "localhost";
$mail->From = $email_admin;// de quien envia
$mail->FromName = $nombre_usuario;// nombre_usuario de quien Envia (empresa)
$mail->Subject = $email_usuario;// contenido del correo
$mail->AddAddress("marlonmartos@hotmail.com","dni_suario de consulta");
#$mail->AddCC("oscuridadtye@hotmail.com");
############## ahora cuerpo
$body  = "Hola <strong>Datos Ingresados</strong><br>";
$body .= $tipos_usuarios_idtipos_usuarios."<br>";
$body .= $nombre_usuario."<br>RESULTADO";
$body .= $result."<br>";
$body .= $fechaguiaMysql."<br>DNI:".$dni_suario_contacto."<br>Direccion"
.$direccion_usuario."<br>
    <font color='red'>no responder este email</font>";
$mail->Body = $body;
############## 
$mail->AltBody = "Copia de seguridad perpsonal registrado";
$mail->Send();

########################################yea end
echo "<script>document.location.href='personal.php'</script>";
	}

?>