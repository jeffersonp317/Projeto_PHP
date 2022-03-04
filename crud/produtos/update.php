<?php
//header
include_once '../header.php';


include_once '../db_connection/db_connect.php';

$id = $_POST['id'];
$produtos = $_POST['nome_produto'];
$cod_barras  = $_POST['cod_barras'];
$valor_unidade = $_POST['valor_unidade'];

$update = $connection->exec("UPDATE produtos set nome_produto='$produtos', cod_barras='$cod_barras', valor_unidade='$valor_unidade' WHERE id='$id'");

echo "$produtos foi atualizado(a) com sucesso! <br><a href='./index.php'>Voltar</a>";


include_once '../footer.php';

?>