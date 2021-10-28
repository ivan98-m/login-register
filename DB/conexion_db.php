<?php
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'universidad';

    try {
    $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
    } catch (PDOException $e) {
    die('Coneccion fallida: ' . $e->getMessage());
    }
?>