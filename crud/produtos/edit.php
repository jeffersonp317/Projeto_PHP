<?php
//header
include_once '../header.php';

include_once '../db_connection/db_connect.php';

$produtos = $connection->query('SELECT * FROM produtos where id='. $_GET['id']);

$getProdutos = $produtos->fetchAll();



//print_r($getClient);

?>

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light">Editar produto</h3>
        <form action="./update.php" method="POST">
            <div class="input-field col s12">
                <input value="<?php echo $getProdutos[0]['nome_produto']?>" type="text" name="nome produto" id="nome_produto">
                <label for="nome_produto">Nome do produto</label>
            </div>
            <div class="input-field col s12">
                <input value="<?php echo $getProdutos[0]['cod_barras']?>" type="text" name="cod barras" id="cod_barras">
                <label for="cod_barras">Código de barras</label>
            </div>
            <div class="input-field col s12">
                <input onkeyup="mascara_valor()" value="<?php echo $getProdutos[0]['valor_unidade']?>" type="text" name="valor unidade" id="valor_unidade">
                <input  type="hidden" name="id" value="<?php echo $getProdutos[0]['id']?>">
                <label for="valor_unidade">Valor por unidade</label>
            </div>

            <button onclick="validar()" type="submit" name="btn-cadastrar" class="btn">Editar</button>
            <a href="./index.php" type="submit" class="btn green">Lista de produtos</a>
        </form>
    </div>

</div>

<script>

function mascara_valor() {
    var elemento = document.getElementById('valor_unidade');
    var valor = elemento.value;

    valor = valor.replace(/\D/g, '')
    valor = valor.replace(/(\d{1})(\d{1,2})$/, "$1,$2")
    valor = valor.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
    elemento.value = valor;

}
    
</script>




<?php
//footer
include_once '../footer.php';

?>