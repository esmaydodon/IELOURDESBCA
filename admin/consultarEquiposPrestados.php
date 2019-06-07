<?php
include '../func/funciones.php';
include 'login.php';
$idc = $_POST['id'];//para naa practicamente :p
#para PersonalUtcPaginacionr
$RegistrosAMostrar=17;
//estos valores los recibo por GET enviados por aki  a un js 
if(isset($_GET['pag'])){
	$RegistrosAEmpezar=($_GET['pag']-1)*$RegistrosAMostrar;
	$PagAct=$_GET['pag'];
//caso contrario los iniciamos
}else{
	$RegistrosAEmpezar=0;
	$PagAct=1;
} # para PersonalUtcPaginacionr
//para sacar ubigeo de el usuario activo o logeado por el sistema  SACAR A UNA FUNCION
$consulata_tipo2=dime(" 
select u.*,du.iddistritos_ubigeo,du.nombre_distrito_provincia_bd,du.idubigeos from 
usuarios_has_distritos_ubigeo as udu inner join distritos_ubigeo as du 
on du.iddistritos_ubigeo=udu.distritos_ubigeo_iddistritos_ubigeo inner join usuarios as u 
on u.idusuarios =udu.idusuarios where u.idusuarios=".$idUsuarioL."");
	while($local=mysql_fetch_assoc($consulata_tipo2))
$ubigeoID=$local['iddistritos_ubigeo'];			
//para sacar ubigeo de el usuario activo o logeado por el sistema
$consulta = dime("SELECT p.*,e.serie_equipo_bd,e.equipos_codigo_bd,u.nombre_usuario FROM prestamo_bd AS p inner join equipos_bd as e on 
p.idequipos_bd=e.idequipos_bd inner join usuarios as u on 
p.idusuarios =u.idusuarios where p.iddistritos_ubigeo = '".$ubigeoID."' and p.prestado_equipo_bd='1' ORDER BY idprestamo_bd DESC
 LIMIT $RegistrosAEmpezar, $RegistrosAMostrar  ")or die(ovni("consultar consulta documento.php"));
echo "<div id='myPrintArea'>
    <table width='100%' border='1' class='tabla' style=''> 
         <tr style='background-color: #30bdff;' >
         <td>ID</td>
         <td>Codigo Equipo</td>        
         <td>detalle_prestamo_bd</td>        
         <td>fecha_prestamo_bd</td>        
         <td>hora_prestamo</td>               
         <td>Responsable</td>               
         <td>Editar</td>     
        </tr>";
while($guia = mysql_fetch_array($consulta)){
	echo "
<tr>
<td>". $guia['idprestamo_bd']."</td>
<td>". $guia['equipos_codigo_bd']."</td>	  
     <td>". $guia['detalle_prestamo_bd']."</td>   
     <td>". $guia['fecha_prestamo_bd']."</td>   
     <td>". $guia['hora_prestamo']."</td>   
     <td>". $guia['nombre_usuario']."</td>   
      <td>
         <div id='pedir'>
         <a  style='cursor:pointer; text-decoration:underline;' onclick='CambiarEstadoAdevuelto(".$guia['idprestamo_bd'].  ")'>
         <img src='../images/32x32/image_edit.png' width='32' height='32'></a>
         </div>
      </td> 

         </tr>
	";
	}
	#PersonalUtcPaginacionr	
$NroRegistros=mysql_num_rows(mysql_query("SELECT u.idusuario_p65,u.dni_usuario_p65_col,
u.ape_paterno_usuario_p65_col,u.ape_materno_usuario_p65_col,u.nombre_usuariop65,u.referencia_usuario_p65_col FROM Usuario_p65 as u ORDER BY u.idusuario_p65 desc "));
$PagAnt=$PagAct-1;
$PagSig=$PagAct+1;
$PagUlt=$NroRegistros/$RegistrosAMostrar;
//verificamos residuo para ver si llevar� decimales
$Res=$NroRegistros%$RegistrosAMostrar;
if($Res>0) $PagUlt=floor($PagUlt)+1;
//desplazamiento
 echo "<tr><td colspan='9'>
<div style='margin-left: 121px;'>
<div  style=' clear:both; width:100%;'>
<a style='float:left;text-decoration:underline;cursor:pointer;' onclick=\"PersonalUtcPaginacion('1')\">Primero</a> ";
if($PagAct>1) echo "<a style='text-decoration:underline;cursor:pointer;' onclick=\"PersonalUtcPaginacion('$PagAnt')\">Anterior</a> ";
echo "<spam style='float:left;'><strong>PersonalUtcPaginacion ".$PagAct."/".$PagUlt."</strong></spam>";
if($PagAct<$PagUlt)  echo " <a style='float:left;text-decoration:underline;cursor:pointer;' onclick=\"PersonalUtcPaginacion('$PagSig')\">Siguiente</a> ";
echo "<a style='float:left;text-decoration:underline;cursor:pointer;' onclick=\"PersonalUtcPaginacion('$PagUlt')\">Ultimo</a></div>";
echo "
<div></td></tr>            
</table>  </div>
";
echo $ubigeoID;
?>
