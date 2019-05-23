<?PHP
session_start();
include("../func/funciones.php");
include('login.php');   //Destruimos las cookies. 
        setcookie("usNick","x",time()-3600); 
        setcookie("usPass","x",time()-3600); 
$_SESSION[] = array();
session_destroy();
?>
<script language="JavaScript" type="text/javascript"> 
location.href = "../index.php"; 
</script>
