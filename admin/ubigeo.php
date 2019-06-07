<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
include '../func/funciones.php';
include 'login.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Panel De Administracion</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/jquery-1.6.4.js"></script>
<script type="text/javascript" src="../js/ajax.js"></script>
<script type="text/javascript"> 
 $(document).ready(function(){
$("#listar_personal").click(function(evento){
     $("#formulario_personal").css("display", "none");
     $("#lista_personal").css("display", "block");
   });	
});
</script>
</head>
<body>
<div id="header_wrapper">
  <div id="header">
    <div id="site_title">
      <h1>
        <?php // include ('ya.php'); ?>
      </h1>
    </div>
   <strong class="MANTRA"> </strong>
   <div id="site_title2">
     <h1><strong class="MANTRA">SISTEMA DE GESTION DE FORMATOS UTC PENSION 65</strong></h1>
   </div>
   <p>&nbsp;</p>
   <strong class="MANTRA">
   <p>&nbsp;</p>
   </strong>
  </div>
  <!-- end of header -->
</div>
<!-- end of menu_wrapper -->
<div id="menu_wrapper">
<?php
include 'includes/menu_1.php';
?>
  <!-- end of menu -->
</div>
<div id="content_wrapper"><!-- end of sidebar -->
  <div id="content">
    <div class="content_box_panel">
      <table width="100%" class="tabla">
        <tr>
          <td width="11%" > 
          <span id="listar_personal" class="button mediano azul" onclick="listarUbigeosUtc()">LISTAR PROVINCIAS / DISTRITOS</span></td><td width="85%"></td>
          
        </tr>
        <tr>
          <td colspan="3"><div id="formulario_personal" class="formulario_personal">
            <form action="registrando_ubigeo.php" method="post" enctype="multipart/form-data">
              <table border="0" class="contacto" width="100%">
                <tr>
                  <td>NOMBRE:</td>
                  <td><input name="nombre_distrito_provincia_bd" type="text" id="nombre_distrito_provincia_bd" size="50" /></td>
                </tr>
                <tr>
                  <td>PROVINCIA /DISTRITO:</td>
                  <td><?php
$consulata_tipo2=dime('select idubigeos,nombre_ubigeo_bd from  ubigeos; ');
    echo"<select id ='idubigeos' name='idubigeos' class='select'>
	     <option value='0'>Seleccione</option>";
		while($local=mysql_fetch_array($consulata_tipo2)){
    	echo"<option value='".$local['idubigeos']."'>".$local['nombre_ubigeo_bd']."</option>";}
	echo"</select></br>";
        ?></td>
                </tr>
                <tr>
                  <td>PERTENECE A LA PROVINCIA DE :</td>
                  <td><?php
$consulata_tipo2=dime('SELECT iddistritos_ubigeo,nombre_distrito_provincia_bd  from distritos_ubigeo  where idubigeos=1 ; ');
    echo"<select id ='iddistritos_ubigeo' name='iddistritos_ubigeo' class='select'>
	     <option value='0'>Seleccione</option>
             <option value='0'>Provincia</option>";
		while($local=mysql_fetch_array($consulata_tipo2)){
    	echo"<option value='".$local['iddistritos_ubigeo']."'>".$local['nombre_distrito_provincia_bd']."</option>";}
	echo"</select></br>";
        ?></td>
                </tr>
                <tr>
                  <td>FECHA:</td>
                  <td><?php echo date('l jS \of F Y h:i:s A');?><br /></td>
                </tr>
                <tr>
                  <td><input type="submit" value="Registrar" /></td>
                </tr>
              </table>
              <input type="hidden" name="phpmailer" />
              <input type="hidden" name="estado_usuario" value="1" />
              <input type="hidden" name="fecha" value="<?php echo date("Y-m-d H:i:s");?>" />
            </form>
          </div></td>
           
        </tr>
        <tr>
          <td colspan="3"><div class="cleaner_h20" id="contenedor_personal">
            <div id="lista_ubigeo" class="lista_ubigeo">lista personal</div>
            <div class="cleaner"></div>
          </div></td>
         
        </tr>
      </table>
    </div>
    
    <div class="content_box">
      <h2>-.-</h2>
      <div class="cleaner"></div>
    </div>
    <div class="content_box_bottom"></div>
  </div>
  <!-- end of content -->
  <div class="cleaner"></div>
</div>
<div id="footer_wrapper">
  <div id="footer">
    <ul class="footer_menu">
      <li><a href="#">INICIO</a></li>
      <li><a href="#">DIPLOMADOS</a></li>
      <li><a href="#">ESPECIALIZACIÓN PROFESIONAL</a></li>
      <li><a href="#">CURSOS DE CAPACITACIÓN</a></li>
      <li><a href="#">CURSOS GRATUITOS</a></li>
      <li class="last_menu"><a href="#">CONTACTO</a></li>
    </ul>
    Copyright &copy; 2014 <a href="http://www.kuraka.net/">kuraka.net</a></div>
</div>
</body>
</html>
