<?php
//header
include_once '../header.php';

?>



<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light">Novo Pedido</h3>
        <form onsubmit="return validar_campos()" action="../pedidos/create.php" method="POST">
            <div onkeyup="alteracor()"   class="input-field col s12">

                <label for="nome"></label>
                <select  class="browser-default" name="nome" id="nome">
                    <option  value="Selecione">Selecione o cliente</option>

                    <?php
                    include_once('../db_connection/db_connect.php');
                    $clients = $connection->query('select * from cliente');

                    foreach ($clients as $client) {
                        echo '<option value="' . $client['id'] . '">' . $client['nome'] . '</option>';
                    }
                    ?>

                </select>
            </div>

            <div onkeyup="alteracor()" class="input-field col s12">

                <label for="nome_produto"></label>
                <select onchange="getUnitaryValue(event), alteracor()" class="browser-default" name="nome_produto" id="nome_produto">
                    <option value="Selecione">Selecione o produto</option>

                    <?php
                    include_once('../db_connection/db_connect.php');
                    $produtos = $connection->query('select * from produtos');

                    foreach ($produtos as $produto) {
                        echo '<option value="' . $produto['id'] . '">' . $produto['nome_produto'] . '</option>';
                    } ?>
                </select>

            </div>

            <script>
                function validar_campos() {

                    let nome = document.getElementById('nome')
                    let produto = document.getElementById('nome_produto')
                    let quantidade = document.getElementById('quantidade')


                    if (nome.value == "Selecione") {
                        alert('Selecione um cliente cadastrado!');
                        document.getElementById('nome').style.border = '1px solid red';
                        return false
                    }

                    if (produto.value == "Selecione") {
                        alert('Selecione um produto cadastrado!');
                        document.getElementById('nome_produto').style.border = '1px solid red';
                        return false
                    }

                    if (quantidade.value == "") {
                        alert('Informe a quantidade!');
                        document.getElementById('quantidade').style.border = '1px solid red';
                        return false
                    }


                }

                function somar() {

                    let iptUn = document.getElementById("valor_unidade");
                    let inpQt = document.getElementById("quantidade");
                    let inpTl = document.getElementById("total");

                    if (inpQt.value != "" && iptUn.value != "") {
                        let total = inpQt.value * iptUn.value
                        inpTl.value = total
                    }
                }

                function mascara_valor() {
                    var elemento = document.getElementById('valor_unidade');
                    var valor = elemento.value;

                    valor = valor.replace(/\D/g, '')
                    valor = valor.replace(/(\d{1})(\d{1,2})$/, "$1,$2")
                    valor = valor.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
                    elemento.value = valor;

                }

                function alteracor() {

                    document.getElementById('nome').style.borderBottom = '1px solid #9e9e9e';
                    document.getElementById('nome').style.borderTop = 'none';
                    document.getElementById('nome').style.borderRight = 'none';
                    document.getElementById('nome').style.borderLeft = 'none';

                    document.getElementById('nome_produto').style.borderBottom = '1px solid #9e9e9e';
                    document.getElementById('nome_produto').style.borderTop = 'none';
                    document.getElementById('nome_produto').style.borderRight = 'none';
                    document.getElementById('nome_produto').style.borderLeft = 'none';

                    document.getElementById('quantidade').style.borderBottom = '1px solid #9e9e9e';
                    document.getElementById('quantidade').style.borderTop = 'none';
                    document.getElementById('quantidade').style.borderRight = 'none';
                    document.getElementById('quantidade').style.borderLeft = 'none';
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


            <div class='input-field col s12'>


                <label for='valor_unidade' class='form-label'>Valor:</label>
                <input onload="mascara_valor()" type='text' class='form-control' id='valor_unidade' oninput="somar()" placeholder='R$' name='valor_unidade' value='' autocomplete='off' readonly>
            </div>


            <div onkeyup="alteracor()" class="input-field col s12">
                <input  type="text" name="quantidade" id="quantidade" oninput="somar(), altera_cor()">
                <label for="quantidade">Quantidade</label>
            </div>

            <div class="input-field col s12">
                <label for="total">Total</label>
                <input type="text" name="total" placeholder='R$' id="total" readonly>

            </div>

            <button type="submit" name="btn-cadastrar" class="btn">Cadastrar</button>
            <a href="index.php" type="submit" class="btn green">Lista de pedidos</a>
        </form>
    </div>

</div>




<?php
//footer
include_once '../footer.php';

?>