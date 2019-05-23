<?php
session_start();
$con=mysqli_connect("localhost","root","12345678","kurakane_ielourdes");
if (!empty($_POST)){
     $nickN = $_POST["usuario_text"]; 
     $passN = $_POST["pass_text"];
     $rs=mysqli_query($con,"select * from usuario_p65 where dni_usuario_p65_col ='$nickN' and pass_usuario ='$passN'");

   if ($rs->num_rows>0) {
	while ($row = mysqli_fetch_array($rs)) { //mientras haya...... while
		$_SESSION['nickN'] = $nickN;
		$_SESSION['passN'] = $passN;
		$_SESSION['idUsuario_p65'] = $row["idUsuario_p65"];
		$_SESSION['Ape_paterno_usuario_p65_col'] = $row["Ape_paterno_usuario_p65_col"];
		$_SESSION['ape_materno_usuario_p65_col'] = $row["ape_materno_usuario_p65_col"];
		$_SESSION['dni_usuario_p65_col'] = $row["dni_usuario_p65_col"];
		$_SESSION['idgrado_bd'] = $row["idgrado_bd"];
		$_SESSION['idseccion_bd'] = $row["idseccion_bd"];
		$_SESSION['voto'] = $row["voto"]; 
		$_SESSION['nombre_usuariop65'] = $row["nombre_usuariop65"]; 
		$_SESSION['iddistritos_ubigeo'] = $row["iddistritos_ubigeo"]; 
		header("location: panelAlumno.php ");
	}
   }else{
   	echo "usuario o contraseña no son validos";
   	echo "select * from usuario_p65 where dni_usuario_p65_col ='$nickN' and pass_usuario ='$passN'";
        
   }

	# code...
} else {
	echo "Llene Formulario!!";
	header("location: inalumno.php");
//	echo "select * from usuario_p65 where dni_usuario_p65_col ='$nickN' and pass_usuario ='$passN'";
}
