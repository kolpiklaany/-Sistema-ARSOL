<?php
	$servername = "localhost";
    $username = "root";
  	$password = "";
  	$dbname = "inndaka2";

	$conn = new mysqli($servername, $username, $password, $dbname);
      if($conn->connect_error){
        die("Conexión fallida: ".$conn->connect_error);
      }

    $salida = "";

    $query = "SELECT * FROM formulariodatos";

    if (isset($_POST['consulta'])) {
    	$q = $conn->real_escape_string($_POST['consulta']);
    	$query="SELECT * FROM formulariodatos WHERE 

		nombre_operador LIKE '%".$q."%' OR
		no_empleado LIKE '%".$q."%' OR
		fecha LIKE '%".$q."%' OR
		rum_economico LIKE '%".$q."%' OR
        tipo LIKE '%".$q."%' OR
        modelo LIKE '%".$q."%' OR
        llegada_operador LIKE '%".$q."%' OR
        salida_operador LIKE '%".$q."%' OR
		encendido_maquina LIKE '%".$q."%' OR
		apagado_maquina LIKE '%".$q."%' OR
		rum_tramo LIKE '%".$q."%' OR
		rum_subtramo LIKE '%".$q."%' OR
		margen LIKE '%".$q."%' OR
		valor_porcentaje LIKE '%".$q."%' OR
		causa LIKE '%".$q."%'";
	
        
    }

    $resultado = $conn->query($query);

    if ($resultado->num_rows>0) {
    	$salida.="<table border=1 class='tabla_datos'>
    			<thead>
					<tr id='titulo'>
					   
    					<td>Nombre</td>
    					<td>No de empleado</td>
    					<td>Fecha</td>
						<td>Teléfono</td>
						<td>Numero economico</td>
						<td>Tipo</td>
						<td>Modelo</td>
                        <td>Llegada del operador</td>
                        <td>Salida del operador</td>
						<td>Encendido de maquina</td>
						<td>Tramo</td>
						<td>Subramo</td>
						<td>Margen</td>
						<td>Valor del Porcentaje</td>
						<td>Causa</td>
    				</tr>

    			</thead>
    			

    	<tbody>";

    	while ($fila = $resultado->fetch_assoc()) {
			$salida.="<tr>
			    
    					<td>".$fila['nombre_operador']."</td>
    					<td>".$fila['no_empleado']."</td>
						<td>".$fila['fecha']."</td>
						<td>".$fila['rum_economico']."</td>
						<td>".$fila['tipo']."</td>
						<td>".$fila['modelo']."</td>
						<td>".$fila['llegada_operador']."</td>
						<td>".$fila['salida_operador']."</td>
						<td>".$fila['encendido_maquina']."</td>
						<td>".$fila['apagado_maquina']."</td>
						<td>".$fila['rum_tramo']."</td>
						<td>".$fila['rum_subtramo']."</td>
						<td>".$fila['margen']."</td>
						<td>".$fila['valor_porcentaje']."</td>
						<td>".$fila['causa']."</td>
						

    				</tr>";

    	}
    	$salida.="</tbody></table>";
    }else{
    	$salida.="NO HAY DATOS :(";
    }


    echo $salida;

    $conn->close();



?>