<?php

require_once ("_db.php");


if (isset($_POST['accion'])){ 
    switch ($_POST['accion']){
        //casos de registros
        case 'acceso_user';
        acceso_user();
        break;
		} 
    }

    function acceso_user() {
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        session_start();
        $_SESSION['username'] = $username;
    
        $conexion = mysqli_connect("localhost", "root", "", "inndaka2");
    
        // Utiliza consultas preparadas para mayor seguridad
        $consulta = "SELECT * FROM usuarios WHERE username=? AND password=?";
        $stmt = mysqli_prepare($conexion, $consulta);
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);
    
        // Obtén la fila de resultados
        $fila = mysqli_fetch_assoc($resultado);
    
        if ($fila) {
            $id_cargo = $fila['id_cargo'];
    
            if ($id_cargo == 1) {
                header('Location: MODULOS/index.php');
            } else if ($id_cargo == 2) {
                header('Location: usuario.php');
            } else {
                header('Location: login.php');
                session_destroy();
            }
        } else {
            header('Location: login.php');
            session_destroy();
        }
    
        // Cierra la conexión y la declaración preparada
        mysqli_stmt_close($stmt);
        mysqli_close($conexion);
    }
/*
function acceso_user() {
    $username=$_POST['username'];
    $password=$_POST['password'];
    session_start();
    $_SESSION['username']=$username;

    $conexion=mysqli_connect("localhost","root","","test");
    $consulta="SELECT * FROM usuarios WHERE username='$username' AND password='$password'";
    $resultado=mysqli_query($conexion, $consulta);
    $filas=mysqli_num_rows($resultado);

    if($filas['id_cargo'] == 1){
        header('Location: admin.php');

    }else if($filas['id_cargo'] == 2){ 
        header('Location: usuario.php');

    }else{
        header('Location: login.php');
        session_destroy();
    }
}*/
/*function acceso_user() {
    $username = $_POST['username'];
    $password = $_POST['password'];
    session_start();
    $_SESSION['username'] = $username;

    // Conexión a la base de datos usando PDO
    try {
        $conexion = new PDO("mysql:host=localhost;dbname=test", "root", "");
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Consulta preparada
        $consulta = "SELECT * FROM usuarios WHERE username=? AND password=?";
        $stmt = $conexion->prepare($consulta);

        // Ejecutar la consulta preparada
        $stmt->execute([$username, $password]);

        // Obtener el número de filas
        $filas = $stmt->rowCount();

        // Cerrar la conexión
        $conexion = null;

        if ($filas) {
            header('Location: usuario.php');
        } else {
            header('Location: login.php');
            session_destroy();
        }
    } catch (PDOException $e) {
        // Manejar errores de conexión
        header('Location: login.php');
        session_destroy();
    }
}*/
?>