<?php
defined('BASEPATH') OR exit('No direct script access allowed');


if(isset($_GET["modal"])) { 
echo '<script>
		$(document).ready(function()
		{
		  $("#' . $_GET["modal"] . '").modal("show");
		});
	</script>';

	if($_GET["modal"] == "register_success"){
	echo '<script type="text/javascript" src="assets/js/query/user.js"></script>';
	}
	if($_GET["modal"] == "addsocio"){
	echo '<script type="text/javascript" src="assets/js/query/socios.js"></script>';
	}
	if($_GET["modal"] == "addmovimiento"){
	echo '<script type="text/javascript" src="assets/js/query/movimientos.js"></script>';
	}


}
 
elseif(isset($_GET["user"])) {
echo '<script type="text/javascript" src="assets/js/query/user.js"></script>';
} 
elseif(isset($_GET["socio"])) {
echo '<script type="text/javascript" src="assets/js/query/socios.js"></script>';
} 
elseif(isset($_GET["movimientos"])) {
echo '<script type="text/javascript" src="assets/js/query/movimientos.js"></script>';
} 
elseif(isset($_GET["upimages"])){ 

}
else{
/// lo que llevara index

}
	
?>

