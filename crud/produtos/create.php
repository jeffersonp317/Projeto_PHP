<?php
//sessão
session_start();
//conexão

require_once '../db_connection/db_connect.php';



if (isset($_POST['btn-cadastrar'])) {



    $produtos = $_POST['nome_produto'];
    $cod_barras = $_POST['cod_barras'];
    $valor_unidade = $_POST['valor_unidade'];

    $connection->exec("INSERT INTO produtos VALUES (default, '$produtos', '$cod_barras', '$valor_unidade')");
    
    unset($connection);
    echo "Cadastrado com sucesso!";
    header('Location: ./index.php');


}