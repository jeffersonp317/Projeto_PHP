<?php



//Conexão
include_once '../db_connection/db_connect.php';

//header
include_once '../header.php';

//Mensagem
include_once '../mensagem.php';

?>



<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light">Produtos:</h3>
        <table class="striped">
            <thead>
                <tr>
                    <th>Nome do produto:</th>
                    <th>Código de barras:</th>
                    <th>Valor por unidade:</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $sql = $connection->query("SELECT *FROM produtos");
               // $resultado = mysqli_query($connect, $sql);
                foreach ($sql as $dados) {
                    echo '
                    <tr>
                        <td> ' . $dados['nome_produto'] . '</td>
                        <td> '. $dados['cod_barras'] . '</td>
                        <td> ' . $dados['valor_unidade'] . '</td>
                        <td><a href="./edit.php?id=' . $dados['id'] . '" class="btn-floating"><i class="material-icons">edit</i></a></td>
                        <td><a  href="./delete.php?id=' . $dados['id'] . '" class="btn-floating red"><i class="material-icons">delete</i></a></td>
                    </tr>
                    ';
                
                }


                ?>
                    
            </tbody>
        </table>
        <br>
        <a href="./adicionar.php" class="btn orange">Adicionar produto</a>
        <a href="../home.php" class="btn">Voltar para a Home</a>
    </div>

</div>

<?php
//footer
include_once '../footer.php';

?>