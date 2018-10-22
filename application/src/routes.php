<?php
include_once '../includes/variables_db.php';
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';
sec_session_start();


include_once '../common/Alerts.php';
$alert = new Alerts;
include_once '../common/Helpers.php';
$helps = new Helpers;
include_once '../common/Fechas.php';
include_once '../common/Mysqli.php';
$db = new dbConn();


/// usuarios
if($_REQUEST["op"]=="1"){
include_once '../../system/user/Usuarios.php';
$usuarios = new Usuarios;
$passw1 = filter_input(INPUT_POST, 'pass1', FILTER_SANITIZE_STRING);
$passw2 = filter_input(INPUT_POST, 'pass2', FILTER_SANITIZE_STRING);
$usuarios->CompararPass($passw1, $passw2); 
//Alerts::Alerta("success","Agregado Correctamente","No se puede hacer la accion solicitada, consulte el manual");
}


if($_REQUEST["op"]=="2"){
include_once '../../system/user/Usuarios.php';
$usuarios = new Usuarios;
$alert->EliminarUsuario($_REQUEST["iden"], $_REQUEST["username"]);
}

if($_REQUEST["op"]=="3"){
include_once '../../system/user/Usuarios.php';
$usuarios = new Usuarios;
$usuarios->EliminarUsuario($_REQUEST["iden"], $_REQUEST["username"]);
}

if($_REQUEST["op"]=="4"){ // terminar usuario
	if($_POST["nombre"] != NULL && $_POST["tipo"] != NULL){
	include_once '../../system/user/Usuarios.php';
	$usuarios = new Usuarios;
	$usuarios->TerminarUsuario(Helpers::Mayusculas($_POST["nombre"]),$_POST["tipo"],sha1($_SESSION['newuser']));	
	} else {
	echo "Faltan datos!! ";	
	}


}


///////////////
if($_REQUEST["op"]=="4"){ // agrega socio
	if($_POST["nombre"] != NULL && $_POST["dui"] != NULL){
	include_once '../../system/socios/Socio.php';
	Socios::AddSocio(
		$_POST["nombre"],
		$_POST["direccion"],
		$_POST["telefono"],
		$_POST["dui"],
		$_POST["nit"]
		);	
	}
}

if($_REQUEST["op"]=="5"){ // ver Socio
	include_once '../../system/movimientos/Movimiento.php';
	include_once '../../system/socios/Socio.php';
	Socios::DatosSocio($_REQUEST["iden"]);
}

if($_REQUEST["op"]=="6"){ // ver movimientos
	include_once '../../system/movimientos/Movimiento.php';
	Movimientos::VerMovimientos();
}

if($_REQUEST["op"]=="7"){ // ver movimientos del socio
include_once '../../system/movimientos/Movimiento.php';
Movimientos::VerMovimientosSocio($_REQUEST["iden"]);
}

if($_REQUEST["op"]=="8"){ // agegar movimiento
	if($_POST["movimiento"] != NULL && $_POST["cantidad"] != NULL){
	include_once '../../system/movimientos/Movimiento.php';
	Movimientos::AddMovimiento(
		$_POST["socio"],
		$_POST["movimiento"],
		$_POST["cantidad"],
		$_POST["descripcion"]
		);
	} else { echo "Faltan datos!"; }

}


?>