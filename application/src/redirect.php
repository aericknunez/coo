<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(isset($_GET["modal"])) include_once 'system/modal/modal.php';

elseif(isset($_GET["user"])) include_once 'system/user/user.php';

elseif(isset($_GET["socio"])) include_once 'system/socios/socios.php';

elseif(isset($_GET["movimientos"])) include_once 'system/movimientos/movimientos.php';

elseif(isset($_GET["upimages"])) include_once 'system/upimages/upimages.php';

else{
include_once 'system/index/index.php';	
}
	
?>