<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
include '../func/funciones.php';
include 'login.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Panel De Administracion - </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="../js/ajax.js"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<!--data piker-->
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css"></link>
<script type="text/javascript" src="../js/jquery.ui.datepicker-es.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script type="text/javascript"  src="../js/jquery-ui.js"></script>

<!--data piker end-->
<script type="text/javascript" src="../js/jquery.PrintArea.js"></script>
<link href="../style.css" rel="stylesheet" type="text/css" />
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script type="text/javascript"> 
 $(document).ready(function(){
$('#listar_personal').click(function(){
           $('#AlumnoPaginacion').css("display", "block");
	  $('#formulario_envioDJ').css('display', 'none');
//	  $('#formulario_potencialEditar').css('display', 'none');
("#botonatras").css("display", "block");
   });	
$("#pedir").click(function(){
	$("#formulario_envioDJ").css("display", "none");
       // $("#AlumnoPaginacion").css("display", "none");
        $("#formulario_potencialEditar").css("display", "block");
  });  
}); 
 
</script>
<script>
 $.datepicker.regional['es'] = {
 closeText: 'Cerrar',
 prevText: '<Ant',
 nextText: 'Sig>',
 currentText: 'Hoy',
 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
 weekHeader: 'Sm',
 dateFormat: 'yy/mm/dd',
 firstDay: 1,
 isRTL: false,
 showMonthAfterYear: false,
 yearSuffix: ''
 };
 $.datepicker.setDefaults($.datepicker.regional['es']);
$(function () {
$("#fechisima").datepicker({
	showOn: 'both',
      changeMonth: true,
      changeYear: true
    });

});
</script>
</head>
<body>
<div id="header_wrapper">
  <div id="header">
    <div style="float: left;">
      <h1> 
       <h1><strong class="MANTRA"> IE Nuestra Señora de Lourdes - Bambamarca</strong></h1> 
      </h1>
    </div>
  
   <div style="float: right;">
     <?php  include('ya.php'); ?>
   </div>
  
  </div>
  <!-- end of header -->
</div>
<!-- end of menu_wrapper -->
<div id="menu_wrapper">
    <div id="menu">
 <ul>
          <li><a href='personal_panel_administrador.php'>ALUMNOS</a></li>
	  <li><a href='documentos_enlace.php'>DOCUMENTOS</a></li>
	  <li><a href='citacion.php'>CITACIÓN</a></li>
                <li><a href='equipos.php'>EQUIPOS</a></li>
          <li><a href='destruir.php' class='current'>SALIR</a></li>
          <li><a href='votaciones.php' class='current'>VOTOS ELECCIONES 2018</a></li>
    </ul>
  </div>
  <!-- end of menu -->
</div>
<div id="content_wrapper"><!-- end of sidebar --> 
  <div id="content">
    <div class="content_box_panel">
  
<span id="listar_personal" class="button mediano azul" onclick="listarAlumnos()">LISTAR ]ALUMNOS</span>
 <!--<span id="buscar_potencial_div" class="button mediano azul" onclick="">REGISTRAR PERSONA</span>-->
<!--formulario para editar--> 
       
<div id="formulario_potencialEditar"></div> 
 <div id="formularioBuscadorPotencial"  >
    <form name="frmbusqueda2" onkeypress="buscarAlumno();" class="contacto">
<input value="1" name="dedoc" type="hidden"/>
<input value="<?php echo $idUsuarioL;?>" name="idusuarioPotencial" type="hidden"/>
Buscar Alumno:
  <input name="dato" id="dato" type="text"/>
  <fieldset>
 <div id="resultadoBusqueda2"></div>
  </fieldset>
  </form>
    </div> 
<div id="AlumnoPaginacion" class="AlumnoPaginacion"></div>
<div id="formulario_envioDJ">
    <form action="registrando_Alumno.php" name="form_personal_utc" method="post" class="contacto" enctype="multipart/form-data" >
            <table border="0">
			 <tr>
                <td>DNI:</td>
                <td><input  name="dni_usuario_p65_col" type="text" id="dni_usuario_p65_col" size="8" /></td>
              </tr>
              <tr>
                <td>APELLIDO PATERNO:</td>
                <td><input name="Ape_paterno_usuario_p65_col" type="text" id="nombre_usuario" size="50" /></td>
              </tr>
             <tr>
                <td>APELLIDO MATERNO:</td>
                <td><input   name="ape_materno_usuario_p65_col" type="text" id="nombre_usuario" size="50" /></td>
              </tr>
            <tr>
                <td>NOMBRE:</td>
                <td><input name="nombre_usuariop65" type="text" id="nombre_usuario" size="50" /></td>
              </tr> 
              <tr>
                <td>SEXO:</td>
                <td><select id ='' name='sexsexo_usuario_p65_colo_usuario_p65_col' class='select'>
                  <option value='0'>Seleccione </option>
                  <option value='1'>Masculino </option>
                  <option value='2'>Femenino </option>
                </select></td>
              </tr>
              <tr>
                <td>Distrito / Provincia:</td>
                <td><?php
$consulata_tipo2=dime(" 
select du.iddistritos_ubigeo,du.nombre_distrito_provincia_bd,du.idubigeos from usuarios_has_distritos_ubigeo as udu 
inner join distritos_ubigeo  as du on
du.iddistritos_ubigeo=udu.distritos_ubigeo_iddistritos_ubigeo inner join usuarios as u on
u.idusuarios =udu.idusuarios
 where u.idusuarios=".$idUsuarioL."");
    echo"<select id ='iddistritos_ubigeo' name='iddistritos_ubigeo' class='select' onchange='MostrarCoordinador();'>";
		while($local=mysql_fetch_array($consulata_tipo2)){ 
			if ($local['idubigeos']==1)
			{
				$distrito_provincia='Provincia +';
				}
				else if($local['idubigeos']==2)
				{
					$distrito_provincia='Distrito';
				}
				
    	echo"<option value='".$local['iddistritos_ubigeo']."'>".$local['nombre_distrito_provincia_bd']."-".$distrito_provincia."</option>";}
	echo"</select></br>";
        ?></td>
              </tr>
			      <tr>
                <td>DIRECCION / CP:</td>
                <td><input name="direccion_usuario_p65_col" type="text" id="direccion_usuario_p65_col" size="50" /></td>
              </tr>
              <tr>
                <td>REFERENCIA:</td>
                <td><input name="referencia_usuario_p65_col" type="text" id="referencia_usuario_p65_col" size="50" /></td>
              </tr>
              <tr><td></td><td><div id="MostrarCorrdinadorDiv"></div></td></tr>
            <tr>
                <td>FECHA DE NACIMIENTO:</td>
                <td><input name="fecha_nacimiento_usuario_p65_col" type="text" id="fecha_nacimiento_usuario_p65_col" size="50" value="yyyy-mm-dd" /></td>
				
              </tr>
              <tr>
                <td>NUMERO DE CELULAR:</td>
                <td><input name="lista_usuario_p65" type="text" id="lista_usuario_p65" size="50" /></td>
              </tr>
              <tr>
                <td><input type="submit" value="Enviar" class="button mediano azul"></td>
                <!--    <span  id="listar_personal" onclick="listarFormatos()">LISTAR FORMATOS</span>-->
              </tr>
            </table>
            <input type="hidden" name="phpmailer" />
            <input type="hidden" name="estado_usuario_p65" value="1" />
            <input type="hidden" name="fecha_de_digitacion" value="<?php echo date("Y-m-d H:i:s");?>" />
            <label><b>Imagen: <spam class="requerido">*</spam></b> <br>
    <input name="file1" type="file" id="file1"><br> </label>
          </form>
</div>
    </div>
  </div>
</div>
<div id="footer_wrapper">
  <div id="footer">
&copy;<a href="http://www.kuraka.net/">K</a></div>
</div>
</body>
</html>

