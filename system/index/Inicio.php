<?php 
class Index{
	
	public function __construct(){

	}
	
	public function TotalSocios(){
    	$db = new dbConn();
    	$a = $db->query("SELECT * FROM socios");
		$total = $a->num_rows;
        $a->close();
    	return $total;
    }

    public function NumeroAportaciones(){
    	$db = new dbConn();
    	$a = $db->query("SELECT * FROM movimientos WHERE movimiento = 1");
		$total = $a->num_rows;
        $a->close();
    	return $total;
    }


    public function NumeroRetiros(){
    	$db = new dbConn();
    	$a = $db->query("SELECT * FROM movimientos WHERE movimiento = 2");
		$total = $a->num_rows;
        $a->close();
    	return $total;
    }


    public function TotalAportaciones(){
    	$db = new dbConn();
    	$a = $db->query("SELECT sum(cantidad) FROM movimientos WHERE movimiento = 1");
    	foreach ($a as $b) {
        $depositos=$b["sum(cantidad)"];
    	} $a->close();
    	return Helpers::Format($depositos);
    }

    public function TotalRetiros(){
    	$db = new dbConn();
    	$a = $db->query("SELECT sum(cantidad) FROM movimientos WHERE movimiento = 2");
    	foreach ($a as $b) {
        $retiros=$b["sum(cantidad)"];
    	} $a->close();
    	return Helpers::Format($retiros);
    }
    
    public function SaldoTotal(){
    	$db = new dbConn();
    	    	// sumar depositos
    	$a = $db->query("SELECT sum(cantidad) FROM movimientos WHERE  movimiento = 1");
    	foreach ($a as $b) {
        $depositos=$b["sum(cantidad)"];
    	} $a->close();
    	//retiros
    	$a = $db->query("SELECT sum(cantidad) FROM movimientos WHERE movimiento = 2");
    	foreach ($a as $b) {
        $retiros=$b["sum(cantidad)"];
    	} $a->close();
    	return Helpers::Format($depositos - $retiros);
    }



} // class

?>