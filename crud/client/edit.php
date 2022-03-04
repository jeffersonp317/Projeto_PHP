<?php
//header
include_once '../header.php';

include_once '../db_connection/db_connect.php';

$client = $connection->query('SELECT * FROM cliente where id='. $_GET['id']);

$getClient = $client->fetchAll();



//print_r($getClient);

?>

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light">Editar cliente</h3>
        <form action="./update.php" method="POST">
            <div class="input-field col s12">
                <input value="<?php echo $getClient[0]['nome']?>" type="text" name="nome" id="nome">
                <label for="nome">Nome</label>
            </div>
            <div class="input-field col s12">
                <input value="<?php echo $getClient[0]['cpf']?>" type="text" name="cpf" id="cpf">
                <label for="cpf">Cpf</label>
            </div>
            <div class="input-field col s12">
                <input value="<?php echo $getClient[0]['email']?>" type="text" name="email" id="email">
                <input type="hidden" name="id" value="<?php echo $getClient[0]['id']?>">
                <label for="email">Email</label>
            </div>

            <button onclick="validar()" type="submit" name="btn-cadastrar" class="btn">Editar</button>
            <a href="index.php" type="submit" class="btn green">Lista de clientes</a>
        </form>
    </div>

</div>

<?php
//footer
include_once '../footer.php';

?>