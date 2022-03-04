<?php
//header
include_once '../header.php';


include_once '../db_connection/db_connect.php';

if ($_POST) {

    $pedido = $_POST['id'] ?? null;
    $cliente = $_POST['nome'] ?? null;
    $produto = $_POST['nome_produto'] ?? null;
    $valor = $_POST['valor_unidade'] ?? null;
    $quantidade = $_POST['quantidade'] ?? null;
    $total = $_POST['total'] ?? null;

    

    $connection->exec("UPDATE pedidos SET id_cliente='$cliente', id_produtos='$produto', id_valor='$valor ', quantidade='$quantidade', total='$total' WHERE numero_pedido='$pedido'");

    unset($connection);

    echo "O número do pedido: '$pedido',  foi atualizado(a) com sucesso! <br><a href='./index.php'>Voltar</a>";
}




include_once '../footer.php';
