<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'application/common/Fechas.php';
include_once 'application/common/Helpers.php';
include_once 'application/common/Mysqli.php';
include_once 'system/index/Inicio.php';
$db = new dbConn();
?>
<div class="card-deck">

<div class="card text-center" style="width: 22rem;">
    <div class="card-header success-color white-text">
        Total de Socios
    </div>
    <div class="card-body">
        <h1 class="display-1"><?php echo Index::TotalSocios() ?></h1>
        
    </div>
</div>

<div class="card text-center" style="width: 22rem;">
    <div class="card-header warning-color white-text">
        Numero de Aportaciones
    </div>
    <div class="card-body">
        <h1 class="display-1"><?php echo Index::NumeroAportaciones() ?></h1>
   </div>
</div>

<div class="card text-center" style="width: 22rem;">
    <div class="card-header danger-color white-text">
        Numero de Retiros
    </div>
    <div class="card-body">
        <h1 class="display-1"><?php echo Index::NumeroRetiros() ?></h1>
 </div>
</div>
</div>


<hr>


<div class="card-deck">

<div class="card text-center" style="width: 22rem;">
    <div class="card-header success-color white-text">
        Total Aportaciones
    </div>
    <div class="card-body">
        <h1 class="display-4"><?php echo Index::TotalAportaciones() ?></h1>
</div>
</div>

<div class="card text-center" style="width: 22rem;">
    <div class="card-header warning-color white-text">
        Total Retiros
    </div>
    <div class="card-body">
        <h1 class="display-4"><?php echo Index::TotalRetiros() ?></h1>
</div>
</div>

<div class="card text-center" style="width: 22rem;">
    <div class="card-header danger-color white-text">
        Saldo Total
    </div>
    <div class="card-body">
        <h1 class="display-4"><?php echo Index::SaldoTotal() ?></h1>
</div>
</div>
</div>