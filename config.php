<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "products_dashboard";



    try{
        $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
    } catch (PDOException $e){
        die('La conexion fallo Error: '.$e->getMessage());
    } 

?>