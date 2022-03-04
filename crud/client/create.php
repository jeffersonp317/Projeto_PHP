<?php
//sessão
session_start();
//conexão

require_once '../db_connection/db_connect.php';



if (isset($_POST['btn-cadastrar'])) {



    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];

    $connection->exec("INSERT INTO cliente VALUES (default, '$nome', '$cpf', '$email')");
    
    unset($connection);
    echo "Cadastrado com sucesso!";
    header('Location: ./index.php');


}