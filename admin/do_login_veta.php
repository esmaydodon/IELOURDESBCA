<?php
$con=mysqli_connect("localhost","root","12345678","kurakane_ielourdes");
if (empty($_POST)) {
//	comprobar si los datos son los correctos 
	$usuario = $_POST["usuario_text"];
	$password = $_POST["pass_text"];
//	comprobar si los datos son los correctos end
   $rs=mysqli_query($con,"select * from usuario_p65 where dni_usuario_p65_col ='$usuario' and pass_usuario ='$password'");  
   if ($rs->num_rows>0) {
   	//      $rs=mysqli_query($con,"select * from usuario_p65 where dni_usuario_p65_col ='$usuario' and pass_usuario =MD5('$password')");  
	//$rs=mysqli_query("select * from usuario_p65");
	while ($row = mysqli_fetch_array($rs)) { //mientras haya...... while
		print_r($row);
		echo $row["pass_usuario"];
		echo "<br/>";
	}
   }else{
   	echo "usuario o contraseña no son validos";
   }

	# code...
} else {
	echo "Llene Formulario!!";
}
