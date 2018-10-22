<?php 
class Movimientos{
	
	public function __construct(){

	}

	public function AddMovimiento($socio,$movimiento,$cantidad,$descripcion) {
			$db = new dbConn();

		$datos = array();
	    $datos["socio"] = $socio;
	    $datos["movimiento"] = $movimiento;
	    $datos["descripcion"] = $descripcion;
	    $datos["cantidad"] = $cantidad;
	    $datos["fecha"] = date("d-m-Y");
	    $datos["fechaF"] = Fechas::Format(date("d-m-Y"));
	    $datos["hora"] = date("H:m:s");
	    if ($db->insert("movimientos", $datos)) {
	       Alerts::Alerta("success","Agregado Correctamente","Movimiento Agregado corectamente!");
	    } 


	}



	public function VerMovimientos($paginax){
    	$db = new dbConn();

    	$ar = $db->query("SELECT * FROM movimientos");
		$num_total_registros = $ar->num_rows; $ar->close();
		
		$tamano_pagina = 25;

			$pagina = $paginax;
			if (!$pagina) {
			   $inicio = 0;
			   $pagina = 1;
			}
			else {
			   $inicio = ($pagina - 1) * $tamano_pagina;
			}
			$total_paginas = ceil($num_total_registros / $tamano_pagina);
				 

    $a = $db->query("SELECT * FROM movimientos ORDER BY id desc LIMIT ".$inicio.", ".$tamano_pagina.""); 
    	if($a->num_rows > 0){
    	echo '<table class="table table-sm">
			  <thead>
			    <tr>
			      <th scope="col">Id</th>
			       <th scope="col">Socio</th>
			      <th scope="col">Movimiento</th>
			      <th scope="col">Descripcion</th>
			      <th scope="col">Cantidad</th>
			      <th scope="col">fecha</th>
			      <th scope="col">Hora</th>
			    </tr>
			  </thead>
			  <tbody>';

	    foreach ($a as $b) {
	    if ($r = $db->select("nombre", "socios", "WHERE id = ".$b["socio"]."")) { 
        $nombre = $r["nombre"];
    	} unset($r);  
	echo '<tr>
	      <th scope="row">'. $b["id"] .'</th>
	      <td>'. $nombre .'</td>
	      <td>'. $b["movimiento"] .'</td>
	      <td>'. $b["descripcion"] .'</td>
	      <td>'. $b["cantidad"] .'</td>
	      <td>'. $b["fecha"] .'</td>
	      <td>'. $b["hora"] .'</td>
	    </tr>';	    
    }
	    echo '</tbody>
			</table>';
		} else {
		echo 'No se han encontrado registros!';	
		}	
		$a->close();



//// paginacion 
	
	 echo '<nav aria-label="pagination example">
    <ul class="pagination pagination-circle pg-blue mb-0">';

	if ($total_paginas > 1) {
   	if ($pagina != 1)
   	echo '<li class="page-item">
            <a id="paginador" op="5" iden="'.($pagina - 1).'" class="page-link" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>';
      for ($i=1;$i<=$total_paginas;$i++) {
         if ($pagina == $i)
            //si muestro el índice de la página actual, no coloco enlace
            echo $pagina;
         else
            //si el índice no corresponde con la página mostrada actualmente,
            //coloco el enlace para ir a esa página
            echo '<li class="page-item"><a id="paginador" op="5" iden="'.$i.'" class="page-link">'.$i.'</a></li>';
         }
      if ($pagina != $total_paginas)
         echo '<li class="page-item">
            <a id="paginador" op="5" iden="'.($pagina + 1).'" class="page-link" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>';
		}
	////////////////////
     echo '</ul> </nav>';    
  
    }


	public function VerMovimientosSocio($iden){
    	$db = new dbConn();
  		echo '<a href="?socio" class="btn-floating btn-sm cyan"><i class="fa fa-backward"></i></a>';
  		
  		if ($r = $db->select("nombre", "socios", "WHERE id = ".$iden."")) { 
        $nombre = $r["nombre"];
    	} unset($r); echo '<h3>'. $nombre .'</h3>';

    	$ar = $db->query("SELECT * FROM movimientos WHERE socio = ".$iden."");
		$num_total_registros = $ar->num_rows; $ar->close();
		
		$tamano_pagina = 25;

			$pagina = $paginax;
			if (!$pagina) {
			   $inicio = 0;
			   $pagina = 1;
			}
			else {
			   $inicio = ($pagina - 1) * $tamano_pagina;
			}
			$total_paginas = ceil($num_total_registros / $tamano_pagina);
				 

    $a = $db->query("SELECT * FROM movimientos WHERE socio = ".$iden." ORDER BY id desc LIMIT ".$inicio.", ".$tamano_pagina.""); 
    	if($a->num_rows > 0){
    	echo '<table class="table table-sm">
			  <thead>
			    <tr>
			      <th scope="col">Cod</th>
			      <th scope="col">Movimiento</th>
			      <th scope="col">Descripci&oacuten</th>
			      <th scope="col">Cantidad</th>
			      <th scope="col">Fecha</th>
			      <th scope="col">Hora</th>
			    </tr>
			  </thead>
			  <tbody>';

	    foreach ($a as $b) {
	echo '<tr>
	      <th scope="row">'. $b["id"] .'</th>
	      <td>'. $b["movimiento"] .'</td>
	      <td>'. $b["descripcion"] .'</td>
	      <td>'. $b["cantidad"] .'</td>
	      <td>'. $b["fecha"] .'</td>
	      <td>'. $b["hora"] .'</td>
	    </tr>';	    
    }
	    echo '</tbody>
			</table>';
		} else {
		echo 'No se han encontrado registros!';	
		}	
		$a->close();



//// paginacion 
	
	 echo '<nav aria-label="pagination example">
    <ul class="pagination pagination-circle pg-blue mb-0">';

	if ($total_paginas > 1) {
   	if ($pagina != 1)
   	echo '<li class="page-item">
            <a id="paginador" op="5" iden="'.($pagina - 1).'" class="page-link" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>';
      for ($i=1;$i<=$total_paginas;$i++) {
         if ($pagina == $i)
            //si muestro el índice de la página actual, no coloco enlace
            echo $pagina;
         else
            //si el índice no corresponde con la página mostrada actualmente,
            //coloco el enlace para ir a esa página
            echo '<li class="page-item"><a id="paginador" op="5" iden="'.$i.'" class="page-link">'.$i.'</a></li>';
         }
      if ($pagina != $total_paginas)
         echo '<li class="page-item">
            <a id="paginador" op="5" iden="'.($pagina + 1).'" class="page-link" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>';
		}
	////////////////////
     echo '</ul> </nav>';    
    
    }

	public function SaldoActual($iden){
    	$db = new dbConn();
    	// sumar depositos
    	$a = $db->query("SELECT sum(cantidad) FROM movimientos WHERE socio = '$iden' and movimiento = 1");
    	foreach ($a as $b) {
        $depositos=$b["sum(cantidad)"];
    	} $a->close();
    	//retiros
    	$a = $db->query("SELECT sum(cantidad) FROM movimientos WHERE socio = '$iden' and movimiento = 2");
    	foreach ($a as $b) {
        $retiros=$b["sum(cantidad)"];
    	} $a->close();
    	return $depositos - $retiros;
    }



}

?>