<?php
include '../func/funciones.php';
$idc = $_POST['id'];//para naa practicamente :p
#para PersonalUtcPaginacionr
$RegistrosAMostrar=10;
//estos valores los recibo por GET enviados por aki  a un js 
if(isset($_GET['pag'])){
	$RegistrosAEmpezar=($_GET['pag']-1)*$RegistrosAMostrar;
	$PagAct=$_GET['pag'];
//caso contrario los iniciamos
}else{
	$RegistrosAEmpezar=0;
	$PagAct=1;
} # para PersonalUtcPaginacionr
$consulta = dime("SELECT u.*,tu.nombre_tipo_usuario FROM usuarios as u  inner join tipos_usuarios  as tu on
u.tipos_usuarios_idtipos_usuarios=tu.idtipos_usuarios ORDER BY u.idusuarios desc LIMIT $RegistrosAEmpezar, $RegistrosAMostrar  ")or die(ovni("consultar ser"));
echo "<div id='myPrintArea'>
    <table width='100%' border='1' class='tabla' style=''> 
         <tr style='background-color: #30bdff;' >
         <td>ID</td>
         <td>Nombre</td>
         <td>Email</td>        
         <td>Nick</td>        
         <td>Dni</td>        
         <td>Telefono</td>        
         <td>Cargo</td>        
         <td>Editar</td>     
        </tr>";
while($guia = mysql_fetch_array($consulta)){
	echo "
<tr>
<td>". $guia['idusuarios']."</td>
<td>". $guia['nombre_usuario']."</td>
     <td>". $guia['email_usuario']."</td>   
     <td>". $guia['nick_usuario']."</td>   
     <td>". $guia['dni_suario']."</td>   
     <td>". $guia['telefono_usuario']."</td>   
     <td>". $guia['nombre_tipo_usuario']."</td>   
      <td>
         <div id='pedir'>
         <a  style='cursor:pointer; text-decoration:underline;' onclick='pedirDatosPersonalUtc(".$guia['idusuarios'].  ")'>
         <img src='../images/32x32/image_edit.png' width='16' height='16'></a>
         </div>
      </td> 

         </tr>
	";
	}
	#PersonalUtcPaginacionr	
$NroRegistros=mysql_num_rows(mysql_query("SELECT u.*,tu.nombre_tipo_usuario FROM usuarios as u  inner join tipos_usuarios  as tu on
u.tipos_usuarios_idtipos_usuarios=tu.idtipos_usuarios ORDER BY u.idusuarios desc "));
$PagAnt=$PagAct-1;
$PagSig=$PagAct+1;
$PagUlt=$NroRegistros/$RegistrosAMostrar;
//verificamos residuo para ver si llevará decimales
$Res=$NroRegistros%$RegistrosAMostrar;
if($Res>0) $PagUlt=floor($PagUlt)+1;
//desplazamiento
 echo "<tr><td colspan='9'>
<div style='margin-left: 121px;'>
<div  style=' clear:both; width:100%;'>
<a style='float:left;text-decoration:underline;cursor:pointer;' onclick=\"PersonalUtcPaginacion('1')\">Primero</a> ";
if($PagAct>1) echo "<a style='text-decoration:underline;cursor:pointer;' onclick=\"PersonalUtcPaginacion('$PagAnt')\"> Anterior </a>  ";
echo "<spam style='float:left;'><strong>Lista de Personal ".$PagAct."/".$PagUlt."</strong></spam>";
if($PagAct<$PagUlt)  echo " <a style='float:left;text-decoration:underline;cursor:pointer;' onclick=\"PersonalUtcPaginacion('$PagSig')\">Siguiente </a> ";
echo "<a style='float:left;text-decoration:underline;cursor:pointer;' onclick=\"PersonalUtcPaginacion('$PagUlt')\">Ultimo</a></div>";
echo "
<div></td></tr>            
</table>  </div>
";
?>