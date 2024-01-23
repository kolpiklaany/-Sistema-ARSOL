<?php
$conexion=mysqli_connect("localhost", "root","", "inndaka2");

if(isset($_POST['registrar'])){

    if(strlen($_POST['username'])>=1 && strlen($_POST['password'])>=1){

        $username = trim($_POST['username']);
        $password = trim($_POST['password']); 
    }
}
?>