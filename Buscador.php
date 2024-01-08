<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="normalize.css">
    <link rel="stylesheet" type="text/css" href="style2.css">
    <link rel="icon" href="imgs/arsol.jpg" type="image/png"> 
	<title>BUSCADORE DE PERSONAL</title>
	
</head>
<body>
<header class="col-Header">
        <div class="col-Header-Left">
            <a href="#" class="col-Button-Link">
                <img src="grupoArsol.png" alt="Logo">
            </a>
            <p id="col-Bienvenida-header"> Bienvenida <b>Marta Caballero</b></p>
        </div>
        <div class="col-Header-Center">
            <h1>COLABORADORES</h1>
        </div>
        <div class="col-Header-Right">
           <!--  <input type="text" placeholder="   Buscar..." name="buscador" id="col-Input-Buscar"> -->
          <!--   <button id="col-BuscarBtn" onclick="buscarInformacion()"><i class="fa fa-search"></i></button> -->
        </div>
    </header>
<section class="principal">
	<div class="formulario">
		<label for="caja_busqueda">Buscar</label>
		<input type="text" name="caja_busqueda" id="caja_busqueda"></input>

		
	</div>

	<div id="datos"></div>
	
	
</section>

<br>
<a href="index.php"><input type="button" value="Regresar"</a>
<style type="text/css">

a{
 text-decoration:none;
}
a input{
	position: relative;
	width: 150px;
	height: 40px;
	border-radius: 20px;
	margin-left: 60px;
	border: 0px;
	background-color: #37C67F;
	font: 14px normal normal uppercase helvatica, arial, serif;
}
</style>
</br>


<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="main.js"></script>

</body>

</html>