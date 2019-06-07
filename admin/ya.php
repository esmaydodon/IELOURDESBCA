<?php 
include("../func/funciones.php");
//include('login.php');
if($loginCorrecto) 
	{
    echo $NombreUsuarioL; 
       }
// si soy el amo  chvr Y SINO solo saludo al USUARIO
 else { echo "El sistema no te ha reconocido";
?> <SCRIPT LANGUAGE="javascript"> 
 location.href = "barado.php"; 
 </SCRIPT> <?php 
} 
?>
