<?php
include '../func/funciones.php';
include 'login.php';
$idc = $_POST['id'];
$consulta= dime("SELECT * FROM usuario_p65  where `idUsuario_p65`=".$idc);
while ($row = mysql_fetch_array($consulta)) {
    echo "<input type='hidden' name='idUsuario_p65' value='$idc'>";
   echo $row['Ape_paterno_usuario_p65_col$']." ".$row['ape_materno_usuario_p65_col']." ".$row['nombre_usuariop65'].
           "<br> Grado:".$row['idgrado_bd']." Seccion:".$row['idseccion_bd']; 
}
?>