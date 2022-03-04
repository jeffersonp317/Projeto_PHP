<?php



//Conexão
include_once '../db_connection/db_connect.php';

//header
include_once '../header.php';

//Mensagem
include_once '../mensagem.php';

?>



<div class="row">
    <div class="col s12 m10 push-m1">
        <h3 class="light">Pedidos:</h3>
        <table class="striped">
            <thead>
                <tr>
                    <th>Número do pedido:</th>
                    <th>Data do pedido:</th>
                    <th>Cliente:</th>
                    <th>Produto:</th>
                    <th>Valor do Produto:</th>
                    <th>Quantidade:</th>
                    <th>Total:</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $listOrder = $connection->query('
                SELECT p.numero_pedido, p.data_pedido, c.nome, pr.nome_produto, p.quantidade, pr.valor_unidade, p.total
                FROM pedidos p
                JOIN cliente c ON p.id_cliente = c.id
                JOIN produtos pr ON p.id_produtos = pr.id;
                
            ');

                foreach ($listOrder as $result) {
                    echo '
                    <tr>
                    <td>' . $result["numero_pedido"] . ' </td>
                    <td> ' . $result["data_pedido"] . ' </td>
                    <td> ' . $result["nome"] . ' </td>
                    <td> ' . $result["nome_produto"] . ' </td>
                    <td> R$ ' . $result["valor_unidade"] . ' </td>
                    <td> ' . $result["quantidade"] . 'x </td>
                    <td> R$ ' . $result["total"] . ' </td>
                        <td><a href="./edit.php?numero_pedido=' . $result['numero_pedido'] . '" class="btn-floating"><i class="material-icons">edit</i></a></td>
                        <td><a  href="./delete.php?id=' . $result['numero_pedido'] . '" class="btn-floating red"><i class="material-icons">delete</i></a></td>
                    </tr>
                    ';
                }


                ?>

            </tbody>
        </table>
        <br>
        <a href="../pedidos/adicionar.php" class="btn orange">Adicionar pedido</a>
        <a href="../home.php" class="btn">Voltar para a Home</a>
    </div>

</div>

<?php
//footer
include_once '../footer.php';

?>