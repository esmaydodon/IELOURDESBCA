<?php
include("../func/funciones.php");$idc = $_POST['id'];
$consulta = dime("SELECT * FROM usuarios as u   where u.idusuarios=$idc ")or die( ovni("Oo"));
while($PersonalUtc = mysql_fetch_array($consulta)){
echo " 
<div style=' '>
<form action='modificandoPersonalUtc.php' name='form_personal_utc' method='post' enctype='multipart/form-data'>
            <table border='0'>
              <tr>
                <td>NOMBRES Y APELLIDOS:</td>
                <td><input name='nombre_usuario' type='text' id='nombre_usuario' size='50' value='". $PersonalUtc['nombre_usuario']."' /></td>
              </tr>
              <tr>
                <td>DNI:</td>
                <td><input name='dni_suario' type='text' id='dni_suario' size='50' value='". $PersonalUtc['dni_suario']."'/></td>
              </tr>
              <tr>
                <td>EMAIL :</td>
                <td><input name='email_usuario' type='text' id='email_usuario' size='50' value='". $PersonalUtc['email_usuario']."' /></td>
              </tr>
              <tr>
                <td>DIRECCION:</td>
                <td><input name='direccion_usuario' type='text' id='direccion_usuario' size='50' value='". $PersonalUtc['direccion_usuario']."' /></td>
              </tr>
              <tr>
                <td>TELEFONO:</td>
                <td><input name='telefono_usuario' type='text' id='telefono_usuario' size='50' value='". $PersonalUtc['telefono_usuario']."'/></td>
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
                <td>";
$consulata_tipo2=dime('select idtipos_usuarios,nombre_tipo_usuario from  tipos_usuarios; ');
    echo"<select id ='tipoUsuario' name='tipoUsuario' class='select' onchange='MostrarCoordinador();'>
	     <option value='0'>Seleccione Cargo</option>";
		while($local=mysql_fetch_array($consulata_tipo2)){
    	echo"<option value='".$local['idtipos_usuarios']."'>'".$local['nombre_tipo_usuario']."'</option>";
               }
	echo"</select></br>
        </td>
              </tr>
              <tr><td></td><td><div id='MostrarCorrdinadorDiv'></div></td></tr>
              <tr>
                <td>USUARIO:</td>
                <td><input name='nick_usuario' type='text' id='nick_usuario' size='50' /></td>
              </tr>
              <tr>
                <td>CONTRASEÑA:</td>
                <td><input name='pass_usuario' type='text' id='pass_usuario' size='50' value='".$PersonalUtc['pass_usuario']."' /></td>
              </tr>
              <tr>
                <td>FECHA:</td>
                <td><?php echo date('l jS \of F Y h:i:s A');?><br/></td>
              </tr>
              <tr>
                <td><input type='submit' value='Enviar' class='button mediano azul'></td>
         
              </tr>
            </table>
            <input type='hidden' name='phpmailer' />
            <input type='hidden' name='estado_usuario' value='1' />
            <input type='hidden' name='fecha' value='<?php echo date('Y-m-d H:i:s');?>' />
          </form>
</div>	";	
	} 
?>