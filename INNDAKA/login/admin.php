<?php

session_start();
error_reporting(0);

$validar = $_SESSION['username'];

if($validar == null || $validar == ''){
    header("Location: login.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>administrador</title>
</head>

<body id="page-top">

    <h1>¡Hola, mundo soy un administrador!</h1>

    <a class="btn btn-warning" href="cerrarSesion.php">Log Out
      <i class="fa fa-power-off" aria-hidden="true"></i>

</body>
