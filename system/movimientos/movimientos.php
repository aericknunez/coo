<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'application/common/Mysqli.php';
$db = new dbConn();
 ?>

<div id="ver-socio"></div>
<div id="ver-movimientos"></div>

<div id="movimientos">
<?php 
include_once 'system/movimientos/Movimiento.php';
Movimientos::VerMovimientos(NULL);
?>
</div>

