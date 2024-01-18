<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="normalize.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" href="imgs/arsol.jpg" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RUM</title>
</head>

<body>
    <!--     Header -->
    <header class="rum-Header">
        <div class="rum-Header-Left">
            <a href="#" class="rum-Button-Link">
                <img src="imgs/grupoArsol.png" alt="Logo">
            </a>
            <p id="rum-Bienvenida-header"> Bienvenida <b>Marta Caballero</b></p>
        </div>
        <div class="rum-Header-Center">
            <h1>COLABORADORES</h1>
        </div>
        <div class="rum-Header-Right">
            <input type="text" placeholder="   Buscar..." name="buscador" id="rum-Input-Buscar">
            <button id="rum-BuscarBtn" onclick="buscarInformacion()"><i class="fa fa-search"></i></button>
        </div>
    </header>
    <!--    CONTENEDOR PADRE -->
    <div class="rum-Div-Padre">
        <div class="rum-Div-Monitorista">
            <form action="../guardar.php" method="post" class="rum-Form-Principal" enctype="multipart/form-data">
                <div class="rum-Titulo">
                    <h2>Monitorista</h2>
                </div>
                <div class="rum-Datos-Generales">
                    <p id="rum-p-Datos-Generales">Datos Generales</p>
                    <div class="rum-Div-Contenido-1">
                                <label for="">Nombre del operador</label>
                                <input type="text" name="nombre-operador" id="rum-Input-Nombre-Operador"
                                    placeholder="Ej. Jos&eacute; Razo Prieto">
                            </div>
                    <div class="rum-Div-No-Empleado-Fecha">
                        <div class="rum-No-Empleado">
                            <label for="rum-Input-No-Empleado">No. de empleado</label>
                            <input type="text" name="rum-no-empleado" id="rum-Input-No-Empleado" placeholder="Ej 123456">
                        </div>
                        <div class="rum-Fecha">
                            <label for="rum-Input-Fecha">Fecha</label>
                            <input type="date" name="rum-fecha" id="rum-Input-Fecha" placeholder="Ej 12/12/2024">
                        </div>
                    </div>
                </div>
                <div class="rum-Datos-Maquina-Vehiculo">
                    <p id="rum-p-Datos-Maquina-Vehiculo">Datos de la maquina y/o vehiculo</p>
                    <div class="rum-Div-Centro-Maquina-Vehiculo">
                    <div class="rum-Numero-Economico">
                        <label for="rum-Input-No-Economico">Numero económico</label>
                        <input type="text" name="rum_economico" id="rum-Input-No-Economico" placeholder="Ej. EQ-250">
                    </div>
                    <div class="rum-Tipo">
                        <label for="rum-Input-Tipo">Tipo</label>
                        <input type="text" name="rum-tipo" id="rum-Input-Tipo" placeholder="Ej. Grúa">
                    </div>
                    <div class="rum-Modelo">
                        <label for="rum-Input-Modelo">Modelo</label>
                        <input type="text" name="rum-modelo" id="rum-Input-Modelo" placeholder="Ej.">
                    </div>
                </div>
                </div>
                <div class="rum-Div-Ubicacion-Trabajos">
                    <p id="rum-p-Ubicacion-Trabajo">Ubicacion de los trabajos</p>
                    <div class="rum-Tramo">
                        <label for="rum-Input-Tramo">Tramo</label>
                        <input type="text" name="rum_tramo" id="rum-Input-Tramo" placeholder="Ej. Salamanca">
                    </div>
                    <div class="rum-Subtramo">
                        <label for="rum-Input-Subtramo">Subtramo</label>
                        <input type="text" name="rum_subtramo" id="rum-Input-Subtramo" placeholder="Ej. Jose Chaves">
                    </div>
                </div>
                <div class="rum-Div-Btn">
                <button type="submit" name="guardar" id="rum-Btn-Guardar">Guardar</button>
                </div>
            </form>
        </div>
    </div>
<!--     <script src="../script.js"></script> -->
</body>

</html>


