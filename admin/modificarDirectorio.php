<?php  
include("../func/funciones.php");
include 'login.php';
$idc = $_POST['id'];//para naa practicamente :p
  $consulata_tipo0=dime("select * from directorio_bd as d WHERE d.iddirectorio_bd=".$idc."");
  
  if ($consulata_tipo0) {
      	while($local0=mysql_fetch_array($consulata_tipo0)){
     echo "<table width='843' border='0'  >
   <tr>
    <td colspan='9'>&nbsp;</td>
    </tr>
  <tr>
    <td width='104'>Distrito</td>
    <td width='310'>"; 
    $consulata_tipo3=dime('select * from usuarios_has_distritos_ubigeo as ud inner join distritos_ubigeo as du on
ud.distritos_ubigeo_iddistritos_ubigeo=du.iddistritos_ubigeo inner join ubigeos as u on
du.idubigeos=u.idubigeos
where ud.idusuarios='.$idUsuarioL.'');
 echo"<select id='iddistritos_ubigeo' name='iddistritos_ubigeo' class='select'>
	     <option value='".$local0['iddistritos_ubigeo']."'>".$local0['iddistritos_ubigeo']."</option>'";
		while($local=mysql_fetch_array($consulata_tipo3)){
    	echo"<option value='".$local['iddistritos_ubigeo']."'>'".$local['nombre_distrito_provincia_bd']."'-'".$local['nombre_ubigeo_bd']."'</option>'";
            }
echo"</select></br></td>
    <td width='411' rowspan='9' >mdmb</td>
  <tr>
    <td>Institucion</td>
    <td><input name='nombre_Institucion_bd' type='text' id='nombre_Institucion_bd' value='".$local0['nombre_Institucion_bd']."' /></td>
  </tr>
  <tr>
    <td>Titular:</td>
    <td><input name='titular_directorio_bd' type='text' id='titular_directorio_bd'  value='".$local0['titular_directorio_bd']."'  />
<div id='contenedorID' ></div>
      <td width='0'></td>
    
  </tr>
   <tr>
    <td>Cargo</td>
    <td><input name='cargo_directorio_bd' type='text' id='cargo_directorio_bd'  value='".$local0['cargo_directorio_bd']."' /></td>
   </tr>
     <tr>
    <td>Direccion</td>
    <td><input name='direccion_directorio_bd' type='text' id='direccion_directorio_bd' value='".$local0['direccion_directorio_bd']."'/></td>
   </tr>
    <tr>
    <td>Email</td>
    <td><input name='email_direectorio_bd' type='text' id='email_direectorio_bd' value='".$local0['email_direectorio_bd']."'/></td>
   </tr>
  <tr>
  
    <td>OBSERVACION</td>
    <td><textarea name='observacion_directorio_bd' cols='50' rows='5' id='observacion_directorio_bd' >".$local0['observacion_directorio_bd']."</textarea></td>
</tr>
   <tr>
    <td>Telefono</td>
    <td><input name='telefono_directorio_bd' id='telefono_directorio_bd' class='telefono_directorio_bd' type='text' value='".$local0['telefono_directorio_bd']."' /></td>
  </tr>
     <tr>
    <td>FECHA</td>
    <td><input name='fecha_registro_direcetorio' id='fecha_registro_direcetorio' class='fecha_registro_direcetorio' type='text' value=' <?php echo date('Y h:i:s A');
    ?>' /></td>
  </tr>
   <tr>
     <td>*</td>
     <td><input name='Submit' value='Registrar' type='submit' /></td>
   </tr></table>";
}
}
  ?>