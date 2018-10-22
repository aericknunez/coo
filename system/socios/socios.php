<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'application/common/Mysqli.php';
$db = new dbConn();
 ?>
  <div class="row justify-content-md-center justify-content-sm-center">
    <div class="col-12 col-md-auto col-sm-auto">   
<a href="?modal=addsocio" class="btn-floating btn-sm blue-gradient"><i class="fa fa-user"></i></a>
</div>
</div>

<div id="ver-socio"></div>
<div id="ver-movimientos"></div>

<div id="socios">
<?php 
include_once 'system/socios/Socio.php';
Socios::VerSocios(NULL);
?>
</div>

