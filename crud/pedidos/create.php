<?php
//sessão
session_start();
//conexão

require_once '../db_connection/db_connect.php';



if ($_POST) {


    $cliente = $_POST['nome'] ?? null;
    $produto = $_POST['nome_produto'] ?? null;
    $valor = $_POST['valor_unidade'] ?? null;
    $quantidade = $_POST['quantidade'] ?? null;
    $total = $_POST['total'];

    $connection->exec("INSERT INTO pedidos VALUES (default,  NOW(), '$cliente', '$produto', '$valor', '$quantidade', '$total')");

    unset($connection);
    echo "Cadastrado com sucesso!";
    header('Location: ./index.php');
}
