<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="normalize.css">
    <link rel="stylesheet" type="text/css" href="style2.css">
    <link rel="icon" href="imgs/arsol.jpg" type="image/png"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>BUSCADOR DE PERSONAL</title>
	
</head>
<body>
<header class="col-Header">
        <div class="col-Header-Left">
            <a href="#" class="col-Button-Link">
            <img src="imgs/grupoArsol.png" alt="Logo">
            </a>
            <p id="col-Bienvenida-header"> Bienvenida <b>Marta Caballero</b></p>
        </div>
        <div class="col-Header-Center">
            <h1>COLABORADORES</h1>
        </div>
        <div class="col-Header-Right">
        <!-- <label for="caja_busqueda">Buscar</label> -->
		<input type="text" name="caja_busqueda" id="caja_busqueda"  placeholder="Buscar">
        </div>
    </header>

<section class="principal">
	<div class="formulario">
    <button class="BtnExcel" id="BtnExportarExcel" onclick="exportarExcel()">
            <i class="fa fa-file-excel-o"></i>
        </button>
    <button id="BtnAgregar" onclick="redireccionar()">Agregar</button>
    <script>
    function redireccionar() {
        window.location.href = 'index.php';
    }
</script>

	</div>
    <div id="datos"></div>
</section>
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="main.js"></script>

</body>

</html>