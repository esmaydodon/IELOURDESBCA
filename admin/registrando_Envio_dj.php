<?php 
include("../func/funciones.php");
require("class.phpmailer.php");
#$Ape_paterno_usuario_p65_col="Ilcat.org.pe.";
//////////////////
$textfechaguia= strtotime($_POST['fecha_de_digitacion']);
$fecha_de_digitacion =date('Y-m-d  H:i:s',$textfechaguia);
 
$fecha_nacimiento_usuario_p65_col =strtotime($_POST['fecha_nacimiento_usuario_p65_col']);
$fecha_nacimiento_usuario_p65_col2 = date("Y-m-d",$fecha_nacimiento_usuario_p65_col); 
/////////////
$Ape_paterno_usuario_p65_col=quitar($_POST[Ape_paterno_usuario_p65_col]);
$dni_usuario_p65_col= quitar($_POST[dni_usuario_p65_col]);
$ape_materno_usuario_p65_col= quitar($_POST[ape_materno_usuario_p65_col]);
$direccion_usuario_p65_col=quitar($_POST[direccion_usuario_p65_col]);
$referencia_usuario_p65_col=quitar($_POST[referencia_usuario_p65_col]);
$nombre_usuariop65=quitar($_POST[nombre_usuariop65]);
$sexo_usuario_p65_col=quitar($_POST[sexo_usuario_p65_col]);
$iddistritos_ubigeo=quitar($_POST[iddistritos_ubigeo]);
$estado_usuario_p65=quitar($_POST[estado_usuario_p65]);
$lista_usuario_p65=quitar($_POST[lista_usuario_p65]);
###################para  guardar en bd la consulta
 $n_file1 = ($_FILES['file1']['name']);#nombre                  TERMINAL ELECTRICO.bmp
$n_file1_tmp = $_FILES['file1']['tmp_name'];#nombre temporal C:\WINDOWS\Temp\php273A.tmp
$n_file1_size = $_FILES['file1']['size'];#tamaño             57694
$n_file1_type = $_FILES['file1']['type'];#tipo               image/bmp	
    if ($n_file1 == '') //  
        { 
        $n_file1 = ""; $sin_file1 = "TRUE"; 
    } else {
          $n_file1 = $cadenatexto;    // CON FICHERO renombrar($n_file1);
          $sin_file1 = "FALSE";
                //$fecha_pp1 = date("Y-m-d"); # tengo problemas co esto
                    }  
//Dirección donde se guardaran los archivos cargados
$upload_ficheros = "../images/contenido/";//Mover direccion temporal de FILE 1 a DIRECCION FINAL en ficheros/pdfs/
$sep=explode('image/',$n_file1_type); // Separamos image/                      //image/bmp
$tipo=$sep[1]; // Optenemos el tipo de imagen que es 
if($tipo == "gif" || $tipo == "pjpeg" || $tipo == "bmp"|| $tipo == "jpeg"|| $tipo == "png"){ 
	if ($tipo =="jpeg") $tipo2 = "jpg"; 	if ($tipo =="bmp")$tipo2 = "bmp";	if ($tipo =="pjpeg")$tipo2 = "jpg"; if ($tipo =="png") $tipo2 = "png";
if ($sin_file1 != "TRUE")
{
    $n_path_file1        =    $upload_ficheros.$dni_usuario_p65_col.'.'.$tipo2;#codigoProducto para el nombre de la imagen 
    $resultado1        =    move_uploaded_file($n_file1_tmp, $n_path_file1);
    if (!$resultado1)
        {
            echo "ERROR: El archivo Imagen no pudo ser cargado al servidor";
            exit;
        }
	    }	    
} 
else echo "el tipo de archivo no es de los permitidos";// Si no es el tipo permitido lo desimos 

$consulta = "INSERT INTO usuario_p65(dni_usuario_p65_col,Ape_paterno_usuario_p65_col
,ape_materno_usuario_p65_col,sexo_usuario_p65_col, fecha_nacimiento_usuario_p65_col
 ,direccion_usuario_p65_col,referencia_usuario_p65_col ,nombre_usuariop65
 ,iddistritos_ubigeo ,estado_usuario_p65
 ,fecha_de_digitacion
 ,lista_usuario_p65,ruta_img1)
 VALUES ('$dni_usuario_p65_col','$Ape_paterno_usuario_p65_col'
,'$ape_materno_usuario_p65_col','$sexo_usuario_p65_col','$fecha_nacimiento_usuario_p65_col2'
,'$direccion_usuario_p65_col','$referencia_usuario_p65_col','$nombre_usuariop65'
,'$iddistritos_ubigeo','$estado_usuario_p65','$fecha_de_digitacion'
,'$lista_usuario_p65','$n_path_file1')";
 $result = dime($consulta)or die(mysql_error());				 
 //  echo $consulta;
    
    ###################para  guardar en bd la consulta end <a href='javascript:history.go(-1)'>Atras</a>
//$phpmailer=$_POST[phpmailer];/////////////  
$email_admin="admin@kuraka.net";

########################################yea
$mail = new PHPMailer();
$mail->Host = "localhost";
$mail->From = $email_admin;// de quien envia
$mail->FromName = $Ape_paterno_usuario_p65_col;// Ape_paterno_usuario_p65_col de quien Envia (empresa)
$mail->Subject = $ape_materno_usuario_p65_col;// contenido del correo
$mail->AddAddress("marlonmartos@hotmail.com","dni_usuario_p65_col de consulta");
#$mail->AddCC("oscuridadtye@hotmail.com");
############## ahora cuerpo
$body  = "Hola <strong>Datos Ingresados</strong><br>".$fecha_de_digitacion;
$body .= $referencia_usuario_p65_col."<br>";
$body .= $Ape_paterno_usuario_p65_col."<br>RESULTADO";
$body .= $result."<br>";
$body .= "<br>DNI:".$dni_usuario_p65_col."<br>Direccion"
.$direccion_usuario_p65_col_usuario_p65_col."<br>
    <font color='red'>No responder este email</font>";
$mail->Body = $body;
############# 
$mail->AltBody = "Copia de seguridad perpsonal registrado";
$mail->Send();

########################################yea end
 echo "<script>document.location.href='personal_panel_enlace.php'</script>";
 

?>