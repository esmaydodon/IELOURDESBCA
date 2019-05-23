<?php 
//estas variables son para guardar datos de los usuarios en caso de que tengan sus kis  en sus sistema y de estas ser corrrectas
include("../func/funciones.php");
      $loginCorrecto = false;   $adminCorrecto = false; $ventas=false;
      $idUsuarioL;  $nickUsuarioL;  $emailUsuarioL;    $NombreUsuarioL;  $tipoUsuarioL; $iddistritos_ubigeo;
      if(isset($_COOKIE["usNick"]) && isset($_COOKIE["usPass"] ) ) 
        { 
        $result = dime("SELECT u.* FROM usuarios as u  inner join usuarios_has_distritos_ubigeo as du on
u.idusuarios=du.idusuarios where u.pass_usuario='".$_COOKIE["usPass"]."'and u.nick_usuario='".$_COOKIE["usNick"]."' "); //los que estan guardadas en los kokies
      if($row = mysql_fetch_array($result)) 
        { 
                 $loginCorrecto = true; 
        $idUsuarioL = $row["idusuarios"]; 
        $nickUsuarioL = $row["nick_usuario"]; 
        $emailUsuarioL = $row["email_usuario"]; 
        $NombreUsuarioL = $row["nombre_usuario"]; 
		$iddistritos_ubigeo = $row["iddistritos_ubigeo"]; 
     
	    $tipoUsuarioL = $row["tipos_usuarios_idtipos_usuarios"];
		
		$result2 = mysql_query("SELECT * FROM usuarios WHERE nick_usuario='".$_COOKIE["usNick"]."' 
        AND pass_usuario='".$_COOKIE["usPass"]."' and tipos_usuarios_idtipos_usuarios = 1 "); 
		if($row2 = mysql_fetch_array($result2))
        { $adminCorrecto = true; }//super admin
        } 
        else 
        { 
        //Destruimos las cookies. tengo problemas cono estos al momento de suvir la imagen
        setcookie("usNick","x",time()-3600); 
        setcookie("usPass","x",time()-3600);
		setcookie("idUsuarioL","x",time()-3600);
        } 
        mysql_free_result($result); 
        } 
        ?>
