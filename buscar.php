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

    $query = "SELECT * FROM datos_personales";

    if (isset($_POST['consulta'])) {
    	$q = $conn->real_escape_string($_POST['consulta']);
    	$query="SELECT * FROM datos_personales WHERE 

		nombres LIKE '%".$q."%' OR
		apellido_paterno LIKE '%".$q."%' OR
		apellido_materno LIKE '%".$q."%' OR
		telefono LIKE '%".$q."%' OR
        tipo_sangre LIKE '%".$q."%' OR
        puesto LIKE '%".$q."%' OR
        empresa LIKE '%".$q."%' OR
        telefono_empresarial LIKE '%".$q."%' OR
		empresa LIKE '%".$q."%' OR
		ubicacion LIKE '%".$q."%' OR
		salario_mensual LIKE '%".$q."%'";
        
    }

    $resultado = $conn->query($query);

    if ($resultado->num_rows>0) {
    	$salida.="<table border=1 class='tabla_datos'>
    			<thead>
					<tr id='titulo'>
					   
    					<td>nombre</td>
    					<td>Apellido paterno</td>
    					<td>Apellido materno</td>
						<td>Teléfono</td>
						<td>Tipo-sangre</td>
						<td>Puesto</td>
						<td>Empresa</td>
                        <td>Tel. empresarial</td>
                        <td>Ubicacion</td>
						<td>Salario mensual</td>
						

    				</tr>

    			</thead>
    			

    	<tbody>";

    	while ($fila = $resultado->fetch_assoc()) {
			$salida.="<tr>
			    
    					<td>".$fila['nombres']."</td>
    					<td>".$fila['apellido_paterno']."</td>
						<td>".$fila['apellido_materno']."</td>
						<td>".$fila['telefono']."</td>
						<td>".$fila['tipo_sangre']."</td>
						<td>".$fila['puesto']."</td>
						<td>".$fila['empresa']."</td>
						<td>".$fila['telefono_empresarial']."</td>
						<td>".$fila['ubicacion']."</td>
						<td>".$fila['salario_mensual']."</td>
						

    				</tr>";

    	}
    	$salida.="</tbody></table>";
    }else{
    	$salida.="NO HAY DATOS :(";
    }


    echo $salida;

    $conn->close();



?>