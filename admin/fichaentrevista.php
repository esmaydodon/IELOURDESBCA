﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
include '../func/funciones.php';
include 'login.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Documentos</title>
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
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script type="text/javascript"> 
 $(document).ready(function(){
$('#listar_personal').click(function(){
           $('#listarDocumentos').css("display", "block");
	  $('#formulario_envioDJ').css('display', 'none');
	$("#formulario_potencialEditar").css("display", "none");
   });	
$("#pedir").click(function(){
	$("#formulario_envioDJ").css("display", "none");
       // $("#listarDocumentos").css("display", "none");
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
$("#fecha_de_envio_documento_bd").datepicker({
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
    <div id="site_title">
      <h1>
        <?php include ('ya.php'); ?>
      </h1>
    </div>
   <strong class="MANTRA"> </strong>
   <div id="site_title2">
     <h1><strong class="MANTRA"> Unidad Territorial Cajamarca - Pension 65</strong></h1>
   </div>
   </strong>
  </div>
  <!-- end of header -->
</div>
<!-- end of menu_wrapper -->
<div id="menu_wrapper">
<?php
include 'includes/menu_administrador.php';
?>
  <!-- end of menu -->
</div>
<div id="content_wrapper"><!-- end of sidebar --> 
  <div id="content">
    <div class="content_box_panel">
  
<span id="listar_personal" class="button mediano azul" onclick="listarDocumentos()">LISTAR DOUMENTOS</span>
 <!--<span id="buscar_potencial_div" class="button mediano azul" onclick="">REGISTRAR PERSONA</span>-->
<!--formulario para editar--> 
       
<div id="formulario_DocumentosEditar"></div> 
 <div id="formularioBuscadorPotencial"  >
    <form name="frmbusqueda2" onkeypress="buscarDocumentos();" class="contacto">
<input value="1" name="dedoc" type="hidden"/>
<input value="<?php echo $idUsuarioL;?>" name="idusuarioPotencial" type="hidden"/>
<!--emviar tambien el id de docuimento para ppsar el id por el link editar-->
Buscar Potencial Usuario:
  <input name="dato" id="dato" type="text"/>
  <fieldset>
 <div id="resultadoBusqueda"></div>
  </fieldset>
  </form>
    </div> 
<div id="listarDocumentos" class="listarDocumentos"></div>
<div id="formulario_envioDJ">
    <form action="registrando_documento.php" name="form_personal_utc" method="post" class="contacto" enctype="multipart/form-data" >
            <table border="0">
	       <tr>
                <td>DOCENTE</td>
                <td><?PHP $consulata_guia=dime("select idusuarios,nombre_usuario 
from usuarios where tipos_usuarios_idtipos_usuarios=10");
    echo"<select id ='docente' name='docente' class='select' >
	     <option value=''>Seleccione</option>";
		while($tipoProg=mysql_fetch_array($consulata_guia)){
    	echo"<option  value='".$tipoProg['idusuarios'] ."'>".$tipoProg['nombre_usuario']."</option>";}
	echo"</select>";?> </td>
              </tr> 
	       <tr>
                <td>FECHA:</td>
                <td><input name="fecha_de_envio_documento_bd" type="text" id="fecha_de_envio_documento_bd" size="15" /></td>
              </tr> 
	       <tr>
                <td>HORA:</td>
                <td><input name="hora" type="text" id="hora" size="15" /></td>
              </tr> 
                <tr>
                    <td>DETALLE DOCUMENTO</td>
                    <td> 
                        <textarea name="detalleDocumento_bd" id="detalleDocumento_bd" rows="10" cols="60">
                        </textarea>
                    </td>
                </tr>
              <tr>
                <td>UBIGEO:</td>
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
				
    	echo"<option value='".$local['iddistritos_ubigeo']."'>".$local['nombre_distrito_provincia_bd']." - ".$distrito_provincia."</option>";}
	echo"</select></br>";
        ?></td>
              </tr>
 
<!--            <tr>
                <td>FECHA DE NACIMIENTO:</td>
                <td><input name="fecha_nacimiento_usuario_p65_col" type="text" id="fecha_nacimiento_usuario_p65_col" size="50" value="yyyy-mm-dd" /></td>
				
              </tr>-->
             
              <tr>
                <td><input type="submit" value="REGISTRAR" class="button mediano azul"></td>
                <!--    <span  id="listar_personal" onclick="listarFormatos()">LISTAR FORMATOS</span>-->
              </tr>
            </table>
            <input type="hidden" name="phpmailer" />
            <input type="hidden" name="estado_documento_bd" value="1" />
            <input type="hidden" name="idUsuario_p65" value="<?php echo $idUsuarioL?>" />
            <input type="hidden" name="fecha_de_digitacion" value="<?php echo date("Y-m-d H:i:s");?>" />
          </form>
</div>
    </div>
  </div>
</div>
<div id="footer_wrapper">
  <div id="footer">
Copyright &copy; 2017 <a href="http://www.kuraka.net/">kuraka.org</a></div>
</div>
</body>
</html>


