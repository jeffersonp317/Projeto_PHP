<?php
//header
include_once '../header.php';

include_once '../db_connection/db_connect.php';

$pedidos = $connection->query('SELECT * FROM pedidos where numero_pedido='. $_GET['numero_pedido']);



$getPedidos = $pedidos->fetchAll();


//var_dump($getPedidos)
//print_r($pedidos);
// echo print_r($getPedidos);

?>


<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light">Novo Pedido</h3>
        <form onsubmit="return valida()" action="../pedidos/update.php" method="POST">
            <div onkeyup="alteracor()" class="input-field col s12">

                <label for="nome"></label>
                <select class="browser-default" name="nome" id="nome">
                    <option value="Selecione">Selecione o cliente</option>

                    <?php
                    include_once('../db_connection/db_connect.php');
                    $clients = $connection->query('select * from cliente');

                    foreach ($clients as $client) {
                        $recebePedidos = $getPedidos[0]['id_cliente'] == $client['id'] ? "selected" : "";
                            echo '<option ' . $recebePedidos .'  value="' . $client['id'] .'">' . $client['nome'] . '</option>';
                    }

                    
                    ?>

                </select>
            </div>

            <div onkeyup="alteracor()" class="input-field col s12">

                <label for="nome_produto"></label>
                <select onchange="getUnitaryValue(event)" class="browser-default" name="nome produto" id="nome_produto">
                    <option value="Selecione">Selecione o produto</option>

                    <?php
                    include_once('../db_connection/db_connect.php');
                    $produtos = $connection->query('select * from produtos');

                    foreach ($produtos as $produto) {
                        $recebeProduto = $getPedidos[0]['id_produtos'] == $produto['id'] ? "selected" : "";
                        echo '<option '. $recebeProduto .'  value="' .  $produto['id'] . '">' . $produto['nome_produto'] . '</option>';
                    } 
                    ?>
                </select>

            </div>

            <script>
                function somar() {

                    let iptUn = document.getElementById("valor_unidade");
                    let inpQt = document.getElementById("quantidade");
                    let inpTl = document.getElementById("total");

                    if (inpQt.value != "" && iptUn.value != "") {
                        let total = inpQt.value * iptUn.value
                        inpTl.value = total
                    }
                }

                function getUnitaryValue(event) {
                    fetch(`../produtos/valorProduto.php?id=${event.target.value}`).then(
                        response => response.json()

                    ).then(
                        raw => document.getElementById('valor_unidade').value = raw['valor_unidade']
                    );
                    // console.log(event.target.value)
                }
            </script>


            <div onkeyup='altera_cor()' class='input-field col s12'>


                <label for='valor_unidade' class='form-label'>Valor:</label>
                <input type='text' class='form-control' id='valor_unidade' oninput="somar()" placeholder='R$' name='valor_unidade' value='<?php echo $getPedidos[0]['id_valor']?>' autocomplete='off' readonly>
            </div>


            <div onkeyup="altera_cor()" class="input-field col s12">
                <input type="text" name="quantidade" value='<?php echo $getPedidos[0]['quantidade']?>' id="quantidade" oninput="somar()">
                <label for="quantidade">Quantidade</label>
            </div>
            <div onkeyup="altera_cor()" class="input-field col s12">
                <label for="total">Total</label>
                <input type="text" name="total" value='<?php echo $getPedidos[0]['total']?>' placeholder='R$' id="total" readonly>

            </div>

            <button type="submit" name="btn-cadastrar" class="btn">Atualizar</button>
            <input type="hidden" name="id" value="<?php echo $getPedidos[0]['numero_pedido']?>">
            <a href="index.php" type="submit" class="btn green">Lista de pedidos</a>
        </form>
    </div>

</div>



<?php
//footer
include_once '../footer.php';

?>