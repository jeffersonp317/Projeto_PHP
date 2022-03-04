
<?php
include_once ('../db_connection/db_connect.php');

$id = $_GET['id'] ?? -1;

if ($id != -1) {
    //Desativa a chave estrangeira para que não ocorra erro ao deletar
    $connection->exec('SET FOREIGN_KEY_CHECKS=0');

     //Query que deleta o cliente selecionado
    $connection->exec('DELETE FROM produtos WHERE id=' . $id);

     //Ativa a chave estrangeira para que os relacionamentos entre as tabelas ocorram sem erro
    $connection->exec('SET FOREIGN_KEY_CHECKS=1');
    
    unset($connection);
    header('Location: ./index.php');
}



?>

