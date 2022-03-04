<?php
//header
include_once '../header.php';


include_once '../db_connection/db_connect.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];

$update = $connection->exec("UPDATE cliente set nome='$nome', cpf='$cpf', email='$email' WHERE id='$id'");

echo "$nome foi atualizado(a) com sucesso! <br><a href='./index.php'>Voltar</a>";


include_once '../footer.php';

?>