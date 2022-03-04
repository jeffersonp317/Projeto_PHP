<?php
//Conexão com o banco de dados
$hostname = 'localhost';
$database = 'compras';
$user = 'root';
$pass = '';

$connection;

try {
    $connection = new PDO("mysql:host=$hostname;dbname=$database", $user, $pass);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {

    echo "Erro de conexão";
}
