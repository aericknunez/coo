<?php 
class Socios{
	
	public function __construct(){

	}

	public function AddSocio($nombre,$dir,$tel,$dui,$nit) {
			$db = new dbConn();

		$datos = array();
	    $datos["nombre"] = Helpers::Mayusculas($nombre);
	    $datos["direccion"] = $dir;
	    $datos["telefono"] = Helpers::Telefono($tel);
	    $datos["dui"] = Helpers::Dui($dui);
	    $datos["nit"] = $nit;
	    $datos["estado"] = "1";
	    if ($db->insert("socios", $datos)) {
	       Alerts::Alerta("success","Agregado Correctamente","Socios Agregado corectamente!");
	    } 


	}

	public function DatosSocio($iden) {
			$db = new dbConn();

			if ($r = $db->select("*", "socios", "WHERE id = $iden")) { 

			echo '<h3 class="text-center">'. $r["nombre"].'</h3>';

			echo '<table class="table table-sm">
				  <thead>
				    <tr>
				      <th scope="col">DUI</th>
				      <th scope="col">'. $r["dui"].'</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<tr>
				      <th scope="row">Direcci&oacuten de residencia</th>
				      <td>'. $r["direccion"].'</td>
				    </tr>
				    <tr>
				      <th scope="row">Tel&eacutefonos</th>
				      <td>'. $r["telefono"].' || '. $r["tel_cel"].'</td>
				    </tr>

				    <tr>
				      <th scope="row">NIT</th>
				      <td>'. $r["nit"].'</td>
				    </tr>
				  </tbody>
				</table>
				<hr>
				<h3>Saldo Actual: $ '. Helpers::Format(Movimientos::SaldoActual($iden)). '</h3>
				';

			echo '<a href="?socio" class="btn-floating btn-sm cyan"><i class="fa fa-backward"></i></a>';
			echo '<a id="movimientossocio" op="7" iden="'. $iden .'" class="btn btn-outline-info btn-rounded waves-effect">Ver Movimientos</a>';
			echo '<a href="?modal=addmovimiento&iden='. $iden .'" class="btn btn-outline-warning btn-rounded waves-effect">Agregar Movimientos</a>';
	    } else {
	        echo "- Error desconocido!!<br />";
	    }
	    unset($r);  

	}

	public function VerSocios($paginax){
    	$db = new dbConn();

    	$ar = $db->query("SELECT * FROM socios");
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
				 

    $a = $db->query("SELECT * FROM socios ORDER BY id desc LIMIT ".$inicio.", ".$tamano_pagina.""); 
    	if($a->num_rows > 0){
    	echo '<table class="table table-sm">
			  <thead>
			    <tr>
			      <th scope="col">Cod</th>
			       <th scope="col">DUI</th>
			      <th scope="col">Nombre</th>
			      <th scope="col">Direcci&oacuten cobro</th>
			      <th scope="col">Tel&eacutefono</th>
			      <th scope="col">Ver</th>
			      <th scope="col">Movimiento</th>
			    </tr>
			  </thead>
			  <tbody>';

	    foreach ($a as $b) {
	echo '<tr>
	      <th scope="row">'. $b["id"] .'</th>
	      <td>'. $b["dui"] .'</td>
	      <td>'. $b["nombre"] .'</td>
	      <td>'. $b["direccion"] .'</td>
	      <td>'. $b["telefono"] .'</td>
	      <td><a id="socio" op="5" iden="'. $b["id"] .'" class="btn-floating btn-sm cyan"><i class="fa fa-eye"></i></a></td>
	      <td><a href="?modal=addmovimiento&iden='. $b["id"] .'"  class="btn-floating btn-sm blue"><i class="fa fa-plus"></i></a></td>
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



}

?>