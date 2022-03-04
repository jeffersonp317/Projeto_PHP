
<?php
include_once('../db_connection/db_connect.php');

$id = $_GET['id'] ?? -1;

if ($id != -1) {
   
    //Query que deleta o pedido selecionado        
    $connection->exec('DELETE FROM pedidos WHERE numero_pedido=' . $id);

   


    unset($connection);
    header('Location: ./index.php');
}



?>

