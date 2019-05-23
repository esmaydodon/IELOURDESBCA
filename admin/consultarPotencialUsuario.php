<?php
include '../func/funciones.php';
include 'login.php';
$idc = $_POST['id'];//para naa practicamente :p
#para PersonalUtcPaginacionr
$RegistrosAMostrar=11;
//estos valores los recibo por GET enviados por aki  a un js 
if(isset($_GET['pag'])){
	$RegistrosAEmpezar=($_GET['pag']-1)*$RegistrosAMostrar;
	$PagAct=$_GET['pag'];
//caso contrario los iniciamos
}else{
	$RegistrosAEmpezar=0;
	$PagAct=1;
} # para PersonalUtcPaginacionr
//para sacar ubigeo
$consulata_tipo2=dime(" 
select u.*,du.iddistritos_ubigeo,du.nombre_distrito_provincia_bd,du.idubigeos from 
usuarios_has_distritos_ubigeo as udu inner join distritos_ubigeo as du 
on du.iddistritos_ubigeo=udu.distritos_ubigeo_iddistritos_ubigeo inner join usuarios as u 
on u.idusuarios =udu.idusuarios where u.idusuarios=".$idUsuarioL."");
	while($local=mysql_fetch_assoc($consulata_tipo2))
$ubigeoID=$local['iddistritos_ubigeo'];			
//para sacar ubigeo
$consulta = dime("SELECT  u.direccion_usuario_p65_col,u.documento_para_envio,u.idusuario_p65,u.dni_usuario_p65_col,u.ape_paterno_usuario_p65_col,
u.ape_materno_usuario_p65_col,u.nombre_usuariop65,u.referencia_usuario_p65_col FROM usuario_p65 as u 
where u.iddistritos_ubigeo ='".$ubigeoID."' ORDER BY u.idusuario_p65 DESC
 LIMIT $RegistrosAEmpezar, $RegistrosAMostrar  ")or die(ovni("consultar ser"));
echo "<div id='myPrintArea'>
    <table width='100%' border='1' class='tabla' style=''> 
         <tr style='background-color: #30bdff;' >
         <td>ID</td>
         <td>DNI</td>        
         <td>Apellido Paterno</td>        
         <td>Apellido materno</td>        
         <td>Nombre</td> 
         <td>CP/Comunidad</td>
         <td>Referencia</td>  
         <td>Documento Envio</td>
         <td>Editar</td>     
        </tr>";
while($guia = mysql_fetch_array($consulta)){
	echo "
<tr>
<td>". $guia['idusuario_p65']."</td>
<td>". $guia['dni_usuario_p65_col']."</td>	
     <td>". $guia['ape_paterno_usuario_p65_col']."</td>   
     <td>". $guia['ape_materno_usuario_p65_col']."</td>   
     <td>". $guia['nombre_usuariop65']."</td>   
     <td>". $guia['direccion_usuario_p65_col']."</td>   
     <td>". $guia['referencia_usuario_p65_col']."</td>   ";
        if ($guia['documento_para_envio']==0) {
            echo "<td style=' background-color: red'>".$guia['documento_para_envio']."</td>";
        }else{echo "<td style='background-color: chartreuse'>".$guia['documento_para_envio']."</td>";}
        echo "
      <td>
         <div id='pedir'>
         <a  style='cursor:pointer; text-decoration:underline;' onclick='pedirDatosPotencial_func(".$guia['idusuario_p65'].  ")'>
         <img src='../images/32x32/image_edit.png' width='32' height='32'></a>
         </div>
      </td> 

         </tr>
	";
	}
	#PersonalUtcPaginacionr	
$NroRegistros=mysql_num_rows(mysql_query("SELECT u.idusuario_p65,u.dni_usuario_p65_col,
u.ape_paterno_usuario_p65_col,u.ape_materno_usuario_p65_col,u.nombre_usuariop65,u.referencia_usuario_p65_col FROM usuario_p65 as u ORDER BY u.idusuario_p65 desc "));
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