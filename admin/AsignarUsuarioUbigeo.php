<?php
session_start(); 
$usuarios=$_SESSION['usuarios']; // remplazamos documeonto por usuario
$distritos=$_SESSION['distritos']; // remplazamos documeonto por usuario
include '../func/funciones.php';
include 'login.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Panel De Administracion</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/jquery-1.6.4.js"></script>
<script type="text/javascript" src="../js/ajax.js"></script>
<script type="text/javascript" src="../js/jquery-ui.js"></script>

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
        <?php //  include ('ya.php'); ?>
      </h1>
    </div>
   <strong class="MANTRA"> </strong>
   <div id="site_title2">
     <h1><strong class="MANTRA">SISTEMA DE GESTION DE FORMATOS UTC PENSION 65</strong></h1>
   </div>
 
 
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
    <td colspan="2"><span id="listar_personal" class="button mediano azul" onclick="listarDistritosAsignados()">LISTAR DISTRITOS ASIGNADOS</span></td>
  
  </tr>
  <tr>
    <td>  <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!formulario de busqueda usuarios!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
        <div id="formularioBuscadorUsuario" >
    <form name="frmbusqueda2" onkeypress="buscarUsuario();" class="contacto">
<input value="1" name="dedoc" type="hidden"/>
 Buscar Usuario:
  <input name="dato" id="dato" type="text"/>
  <fieldset>
 <div id="resultadoBusqueda2"></div>
  </fieldset>
  </form>
    </div>  
    <div id="datosusuarios"> </div>
    <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!formulario de busqueda usuarios end !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!--></td>
    <td> <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!formulario de busqueda distritos!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
        <div id="formularioBuscadorUsuario" >
    <form name="frmbusqueda2Distritos" onkeypress="buscarDistrito();" class="contacto">
<input value="1" name="dedoc" type="hidden">
 Buscar Distrito:
  <input name="dato" id="dato" type="text">
  <fieldset>
 <div id="resultadoBusqueda2Distrito"></div>
      </fieldset>
  </form>
    </div>  
    <div id="datosDistritos"> </div>
    <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!formulario de busqueda distritos end !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->   </td>
  </tr>
  <tr>
    <td><?php 
if($usuarios){
	 foreach($usuarios as $k => $d){
             if(!$usuario || !isset($usuario[md5($d['idusuarios'])]['identificador']) || 
	$usuario[md5($d['idusuarios'])]['identificador']!= md5($d['idusuarios']))
    {
                 $cadenaAgregarQuitar="<a href='borracarusuario.php?SID&id=".$d['idusuarios']."&dedo=".$dedonde."'>
<img src='../images/trash.gif' border='0' title='Deseleccionar'></a>";
}else{
$cadenaAgregarQuitar="<a href='agregausuario.php?SID&id=".$d['idusuarios']."&dedo=".$dedonde."'>
<img src='../images/productonoagregado.gif' border='0' title='Seleccionar'></a><br>";	
	}
        echo"Dni:".$d['dni_suario']."<br>
                usuario:".$d['nombre_usuario']."<br>
		Direccion:".$d['direccion_usuario'];
        		  echo $cadenaAgregarQuitar."</h2>"; }
	 }
?></td>
    <td><?php 
if($distritos){
	 foreach($distritos as $k => $d){
             if(!$distrito || !isset($distrito[md5($d['iddistritos_ubigeo'])]['identificador']) || 
	$distrito[md5($d['iddistritos_ubigeo'])]['identificador']!= md5($d['iddistritos']))
    {
                 $cadenaAgregarQuitar="<a href='borracarDistrito.php?SID&id=".$d['iddistritos_ubigeo']."&dedo=".$dedonde."'>
<img src='../images/trash.gif' border='0' title='Deseleccionar'></a>";
}else{
$cadenaAgregarQuitar="<a href='agregaDistrito.php?SID&id=".$d['iddistritos_ubigeo']."&dedo=".$dedonde."'>
<img src='../images/productonoagregado.gif' border='0' title='Seleccionar'></a><br>";	
	}
        echo"Nombre:".$d['nombre_distrito_provincia_bd']."<br>
                Tipo:".$d['nombre_ubigeo_bd']."";
        		  echo $cadenaAgregarQuitar."<br>"; }
	 }
?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
   <div class="cleaner_h20" id="contenedor_personal">
     <div id="buscadorYdatosusuarios">
       
     <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!sesion de usuarios!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
                        <div  style="float: left;margin-left: 50px;margin-left: 0px;margin-top: 20px; clear: both;">
            
                  </div>
     <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!sesion de usuarios end!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
    </div>
    <div id="buscadorYdatosDistritos">
    
           <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!sesion de distritos!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
                        <div  style="float: left;margin-left: 50px;margin-left: 0px;margin-top: 20px; clear: both;">
                                  
                  </div>
     <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!sesion de distritos end!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!--> 
    </div>
    <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!grabar datos de usuario y distrito al que pertenece!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!--> 
    <div id="formulario_personal" class="formulario_personal">
 <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!grabarbBD!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
<form name="formularioGuardar" action="registrandoUsuarioHbigeo.php" method="post">
<?php  
if ($usuarios) {// el if es para uqe no muestre error cuando  las sesiones esteen vasias
   foreach($usuarios as $k => $d)
     {
     echo " <input type='hidden' name='idusuarios' value='".$d['idusuarios']."'></input>";
     }  
} 
if ($distritos) {
   foreach($distritos as $k => $v)
         { 
   echo "<input type='hidden' name='iddistritos_ubigeo' value='".$v['iddistritos_ubigeo']."'> ";  
	 }    
}

 ?>
<input type="hidden" name="fecha" value="<?php echo date("Y-m-d H:i:s");?>">
<input type="submit" name="Submit" value="Registrar Distritos Asignados "/>
</form>
<!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!grabarbBD!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
</div>
<!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!grabar datos de usuario y distrito al que pertenece end !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
<div id="lista_distritos_asignados"> </div>
<div class="cleaner"></div>
    </div>
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
   </div>
</div>
</body>
</html>
