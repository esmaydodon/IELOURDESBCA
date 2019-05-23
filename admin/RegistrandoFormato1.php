<?php 
session_start(); 
$usuarios=$_SESSION['usuarios']; // usuario
$actividades=$_SESSION['actividades']; // distritos
$componente=$_SESSION['componente']; // distritos
$indicador=$_SESSION['indicador']; // distritos
$distritos=$_SESSION['distritos']; // distritos
$ct=$_SESSION['ct']; // distritos
include("../func/funciones.php");
//unset($iddistritos_ubigeo);
//unset($iddistritos_ubigeo);
$idcomponentes_bd= quitar($_POST['idcomponentes_bd']);
$idactividades_bd= quitar($_POST['idactividades_bd']);
$idindicadores_bd= quitar($_POST['idindicadores_bd']);
$idusuarioActivo= quitar($_POST['idusuarioActivo']);
$id_cordinador_bd= quitar($_POST['idusuariosct']);
$iddistritos_ubigeo= quitar($_POST['iddistritos_ubigeo']);

$idformatos_bd= quitar($_POST['idformatos_bd']);
$Comunidad= quitar($_POST['Comunidad']);
$valor_indicador_bd= quitar($_POST['valor_indicador_bd']);
$observacion_indicador= quitar($_POST['observacion_indicador']);
$fecha_indicador_ejecutado= quitar($_POST['fecha_indicador_ejecutado']);
$tDate = strtotime($_POST['fecha_creacion_bd']);
$dateToMySQL = date("Y-m-d",$tDate); // Formato de Date en mysql es: aaaa-mm-dd
$hora=date("Y-m-d H:i:s",$tDate);
 $insertardetallepago=dime("INSERT INTO  usuarios_formatos_indicadores_bd 
        (idusuarios,idformatos_bd,idindicadores_bd,idcomponentes_bd,
        idactividades_bd,fecha_creacion_bd,valor_indicador_bd,iddistritos_ubigeo,
        fecha_indicador_ejecutado,observacion_indicador,Comunidad,id_cordinador_bd) values 
        ('$idusuarioActivo','$idformatos_bd','$idindicadores_bd','$idcomponentes_bd','$idactividades_bd','$dateToMySQL','$valor_indicador_bd','$iddistritos_ubigeo',
            '$fecha_indicador_ejecutado','$observacion_indicador','$Comunidad','$id_cordinador_bd')")or die(mysql_error());	

//echo "INSERT INTO  usuarios_formatos_indicadores_bd 
//        (idusuarios,idformatos_bd,idindicadores_bd,idcomponentes_bd,
//        idactividades_bd,fecha_creacion_bd,valor_indicador_bd,iddistritos_ubigeo,
//        fecha_indicador_ejecutado,observacion_indicador,Comunidad,id_cordinador_bd) values 
//        ('$idusuarioActivo','$idformatos_bd','$idindicadores_bd','$idcomponentes_bd','$idactividades_bd','$dateToMySQL','$valor_indicador_bd','$iddistritos_ubigeo',
//            '$fecha_indicador_ejecutado','$observacion_indicador','$Comunidad','$id_cordinador_bd')";


	$_SESSION[] = array();
 //session_destroy();//estoy entendiendo quela seion se puedo terminar (php5) con esto basta 
 if ($idformatos_bd=='1') {
    echo "<script>document.location.href='formato1.php'</script>";
}  elseif ($idformatos_bd=='2') {
      echo "<script>document.location.href='formato2.php'</script>";
}  elseif ($idformatos_bd=='3') {
    echo "<script>document.location.href='formato3.php'</script>";
}


?> 