<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inndaka2";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
/*     echo "Conexión exitosa"; */
} catch(PDOException $e) {
    echo "Conexión fallida: " . $e->getMessage();
}
?>

