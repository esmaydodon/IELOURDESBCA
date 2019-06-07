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
<script type="text/javascript" src="../js/ajax.js"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<!--data piker--> 
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css"></link>
<script type="text/javascript" src="../js/jquery.ui.datepicker-es.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

<!--data piker end-->
<script type="text/javascript" src="../js/jquery.PrintArea.js"></script>
<script type="text/javascript"> 
 $(document).ready(function(){
$("#listar_personal").click(function(evento){
           $("#lista_personal").css("display", "block");// nuestra lista
		$("#formulario_personal").css("display","none");// oculta formulario de registro
		$("#listar_personal").css("background-color","rgba(170, 170, 170, 0.23)");//cambia el fondo del boton listar
		//$("#formulario_personalEditar").css("display", "none");
		
   });	
$("#pedir").click(function(evento){//para trabajar con link de editar de registro de lista mostrada
        $("#formulario_personal").css("display","none");// oculta formulario de registro
		$("#formulario_personalEditar").css("display", "block");//muestra el formulario para editar registro seleccionado
          });  
});
</script>
</head>
<body>
<div id="header_wrapper">
  <div id="header">
    <div id="site_title">
      <h1>
        <?php //include ('ya.php'); ?>
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
  <div class="content_box_bottom">
    <table width="849px"  class="tabla">
      <tr>
        <td width="9%"><span id="listar_personal" class="button mediano azul" onclick="listarPersonalUtc()">LISTAR PERSONAL</span></td>
        <td width="24%"><h2>&nbsp;</h2></td>
        <td width="63%">&nbsp;</td>
        <td width="4%">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="4">
             <div id="formulario_personalEditar"></div>
            <div id="lista_personal" class="lista_personal"> </div>
            <div id="formulario_personal" class="formulario_personal" >
          <form action="registrando_usuarios.php" name="form_personal_utc" method="post" enctype="multipart/form-data">
            <table border="0">
              <tr>
                <td>NOMBRES Y APELLIDOS:</td>
                <td><input name="nombre_usuario" type="text" id="nombre_usuario" size="50" /></td>
              </tr>
              <tr>
                <td>DNI:</td>
                <td><input name="dni_suario" type="text" id="dni_suario" size="50" /></td>
              </tr>
              <tr>
                <td>EMAIL :</td>
                <td><input name="email_usuario" type="text" id="email_usuario" size="50" /></td>
              </tr>
              <tr>
                <td>DIRECCION:</td>
                <td><input name="direccion_usuario" type="text" id="direccion_usuario" size="50" /></td>
              </tr>
              <tr>
                <td>TELEFONO:</td>
                <td><input name="telefono_usuario" type="text" id="telefono_usuario" size="50" /></td>
              </tr>
              <tr>
                <td>SEXO:</td>
                <td><select id ='SEXO' name='SEXO' class='select'>
                  <option value='0'>Seleccione </option>
                  <option value='1'>Mascuino </option>
                  <option value='2'>Femanino </option>
                </select></td>
              </tr>
              <tr>
                <td>CARGO:</td>
                <td><?php
$consulata_tipo2=dime('select idtipos_usuarios,nombre_tipo_usuario from  tipos_usuarios; ');
    echo"<select id ='tipoUsuario' name='tipoUsuario' class='select' onchange='MostrarCoordinador();'>
	     <option value='0'>Seleccione Cargo</option>";
		while($local=mysql_fetch_array($consulata_tipo2)){
    	echo"<option value='".$local['idtipos_usuarios']."'>".$local['nombre_tipo_usuario']."</option>";}
	echo"</select></br>";
        ?></td>
              </tr>
              <tr><td></td><td><div id="MostrarCorrdinadorDiv"></div></td></tr>
              <tr>
                <td>USUARIO:</td>
                <td><input name="nick_usuario" type="text" id="nick_usuario" size="50" /></td>
              </tr>
              <tr>
                <td>CONTRASEÑA:</td>
                <td><input name="pass_usuario" type="text" id="pass_usuario" size="50" /></td>
              </tr>
              <tr>
                <td>FECHA:</td>
                <td><?php echo date('l jS \of F Y h:i:s A');?><br/></td>
              </tr>
              <tr>
                <td><input type="submit" value="Enviar" class="button mediano azul"></td>
                <!--    <span  id="listar_personal" onclick="listarFormatos()">LISTAR FORMATOS</span>-->
              </tr>
            </table>
            <input type="hidden" name="phpmailer" />
            <input type="hidden" name="estado_usuario" value="1" />
            <input type="hidden" name="fecha" value="<?php echo date("Y-m-d H:i:s");?>"/>
          </form>
        </div>
         </td>
       
      </tr>
      <tr>
        <td colspan="4">
        <div  id="contenedor_personal">      </div>
        </td>
      </tr>
    </table>

  </div>

    </div>
    
    
  
  </div>
  <!-- end of content -->
  
</div>
<div id="footer_wrapper">
  <div id="footer">
    <ul class="footer_menu">
  &copy;  <a href="http://www.kuraka.net/">kuraka.net</a>
    </ul>
     </div>
</div>
</body>
</html>
