<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php include 'func/conexion.php';
echo"modificdoporarlon";

include 'func/funciones.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>IE NUESTRA SEÑORA DE LOURDES - BAMBAMARCA</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
    <body style="background: #fff;">
<div id="header_wrapper">
  <div id="header" style="background-color:#FFF;  ">
    <div id="site_title">
      <h1>&nbsp;</h1>
    </div>
   <strong class="MANTRA"> </strong>
   <div id="site_title2">
     <h1>IE NUESTRA SEÑORA DE LOURDES - BAMBAMARCA </h1>
   </div>
   <p><strong class="MANTRA"><img alt="IE Lourdes Bambamarca" src="images/logo2.png"></img></strong></p>
   
  </div>
  <!-- end of header -->
</div>
<!-- end of menu_wrapper -->
<div id="menu_wrapper" style="display:none;">
  <div id="menu">
    <ul>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
    </ul>
  </div>
  <!-- end of menu -->
</div>
<div id="content_wrapper">
  <div id="sidebar" style="margin-left:30%;">
    <div class="sidebar_box">
      <form action="admin/validar.php" method="post">
<!--<input value="1" name="tipoUsuario" type="hidden">--><span><br></span>
 <table width="200">
   <tr>
     <td>&nbsp;</td>
     <td><?php
//$consulata_tipo2=dime('select idtipos_usuarios,nombre_tipo_usuario from  tipos_usuarios; ');
//    echo"<select id ='tipoUsuario' name='tipoUsuario' class='select'>
//	     <option value='0'>Seleccione Cargo</option>";
//		while($local=mysql_fetch_array($consulata_tipo2)){
//    	echo"<option value='".$local['idtipos_usuarios']."'>".$local['nombre_tipo_usuario']."</option>";}
//	echo"</select></br>";
        ?></td>
   </tr>
   <tr>
     <td>Usuario:</td>
     <td><input name="usuario_text" type="text" /></td>
   </tr>
   <tr>
     <td>Contraseña:</td>
     <td><input name="pass_text" type="password" /></td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td><input name="Submit" value="Ingresar" type="submit" /></td>
   </tr>
  
 </table>
 <span><br></span>
      </form>              
<div class="cleaner"></div>
    </div>
  </div>
  <!-- end of sidebar --><!-- end of content -->
  <div class="cleaner"></div>
</div>
<div id="footer_wrapper">
  <div id="footer">
    <ul class="footer_menu">
<!--      <li>| Copyright &copy; 2014 <a href="http://www.kuraka.net/">kuraka.net</a></li>-->
    </ul>
  </div>
</div>
</body>
</html>
