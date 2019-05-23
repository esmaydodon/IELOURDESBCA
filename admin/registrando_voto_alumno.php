<!DOCTYPE html >
  <head>
    <title>Gracias</title>
    <link href="../style.css" rel="stylesheet" type="text/css" />
</head>
<body> 
<?php 
session_start();
include("../func/funciones.php");
require("class.phpmailer.php");
#$Ape_paterno_usuario_p65_col="Ilcat.org.pe.";
//////////////////
$fecha_de_digitacion= strtotime($_POST['fecha_de_digitacion']);
$fecha_de_digitacion =date('Y-m-d  H:i:s',$fecha_de_digitacion);
 
$iddistritos_ubigeo=quitar($_POST[iddistritos_ubigeo]);
$idUsuario_p65=quitar($_POST[idUsuario_p65]);
$voto=quitar($_POST[voto]);
$candidato=$_POST[candidatos]; 


//consulamos los candidatos con el ID enviado 
$consultarCandidatos=dime("select * from candidato where idcandidato= '$candidato';");
//con ese ID del candidato se consulta   el numero de votos actuales
//echo "select * from candidato where idcandidato= '$candidato'";
if ($row = mysql_fetch_array($consultarCandidatos)) {
    $nuevoVoto=$row['voto']+1;
//    echo "Distrito".$iddistritos_ubigeo;
//    echo "Usuario".$idUsuario_p65;
//    echo "Voto:".$nuevoVoto;
//    echo "Candidato:".$candidato;
    ////luego se suma uno a el voto actual - alter table
$consulta = "UPDATE candidato SET `voto`='$nuevoVoto' WHERE idcandidato=$candidato";
 $result = dime($consulta)or die(mysql_error());	
 $consulta2 = "UPDATE  usuario_p65 SET `voto`='1' WHERE idUsuario_p65=$idUsuario_p65";
 $result = dime($consulta2)or die(mysql_error());
//  echo "UPDATE  usuario_p65 SET `voto`='1' WHERE idUsuario_p65=$idUsuario_p65";
 Echo "<div id='edis' >Gracias Por Emitir Su Eleccicon !!<a href='destruir2.php' class='current'>SALIR</a> </div>";
}
//cambiar el estado a 1 para que ya o emita otra vez!! 

else{
    echo "Contacte con le administrador del Sistema!";
}

//// se cambia el estado del Alumno a voto =1;
//
//$consulta = "INSERT INTO candidato(idcandidato,voto,idUsuario_p65)
// VALUES ('$candidato','$voto','$idUsuario_p65')";
// $result = dime($consulta)or die(mysql_error());				 
// //  echo $consulta;
//    
//    ###################para  guardar en bd la consulta end <a href='javascript:history.go(-1)'>Atras</a>
////$phpmailer=$_POST[phpmailer];/////////////  
//$email_admin="admin@kuraka.net";
//
//########################################yea
//$mail = new PHPMailer();
//$mail->Host = "localhost";
//$mail->From = $email_admin;// de quien envia
//$mail->FromName = $Ape_paterno_usuario_p65_col;// Ape_paterno_usuario_p65_col de quien Envia (empresa)
//$mail->Subject = $ape_materno_usuario_p65_col;// contenido del correo
//$mail->AddAddress("marlonmartos@hotmail.com","dni_usuario_p65_col de consulta");
//#$mail->AddCC("oscuridadtye@hotmail.com");
//############## ahora cuerpo
//$body  = "Hola <strong>Datos Ingresados</strong><br>".$fecha_de_digitacion;
//$body .= $referencia_usuario_p65_col."<br>";
//$body .= $Ape_paterno_usuario_p65_col."<br>RESULTADO";
//$body .= $result."<br>";
//$body .= "<br>DNI:".$dni_usuario_p65_col."<br>Direccion"
//.$direccion_usuario_p65_col_usuario_p65_col."<br>
//    <font color='red'>No responder este email</font>";
//$mail->Body = $body;
//############# 
//$mail->AltBody = "Copia de seguridad perpsonal registrado";
//$mail->Send();
//
//########################################yea end
// echo "<script>document.location.href='personal_panel_secretaria.php'</script>";
 

?>

  </body>
</html>
    