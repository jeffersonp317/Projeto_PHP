<?php
//header
include_once '../header.php';

?>

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light">Novo Produto</h3>
        <form onsubmit="return validar()" action="../produtos/create.php" method="POST">
            <div onkeyup="alteracor()" class="input-field col s12">
                <input type="text" name="nome produto" id="nome_produto">
                <label for="nome_produto">Nome do produto</label>
            </div>
            <div onkeyup="alteracor()" class="input-field col s12">
                <input  type="text" name="cod barras" id="cod_barras">
                <label for="cod_barras">Código de barras</label>
            </div>
            <div onkeyup="alteracor(), mascara_valor()"  class="input-field col s12">
                <input  type="text" name="valor unidade" id="valor_unidade">
                <label for="valor_unidade">Valor por unidade</label>
            </div>

            <button  type="submit" name="btn-cadastrar" class="btn">Cadastrar</button>
            <a href="index.php" type="submit" class="btn green">Lista de produtos</a>
        </form>
    </div>

</div>

<script>

/*----------------------------Validação dos campos vazios------------------------------------*/

function validar() {
    
    
    
    let prod = document.getElementById('nome_produto')
    let barras= document.getElementById('cod_barras')
    let valor = document.getElementById('valor_unidade')
    

    
    
    if (prod.value == "") {
        alert('Preencha o campo Produto!');
        document.getElementById('nome_produto').style.border = '1px solid red';
        return false
    }

    if (barras.value == "") {
        alert('Preencha o campo Código de barras!');
        document.getElementById('cod_barras').style.border = '1px solid red';
        return false
    } 

    if (valor.value == "") {
        alert('Preencha o campo Valor da unidade!');
        document.getElementById('valor_unidade').style.border = '1px solid red';
        return false
    }


}
/*--------------- Altera a cor dos campos quando a validação é bem sucedida -----------------*/

function alteracor() {

    document.getElementById('nome_produto').style.borderBottom = '1px solid #9e9e9e';  
    document.getElementById('nome_produto').style.borderTop = 'none';
    document.getElementById('nome_produto').style.borderRight = 'none';
    document.getElementById('nome_produto').style.borderLeft = 'none';

    document.getElementById('cod_barras').style.borderBottom = '1px solid #9e9e9e';  
    document.getElementById('cod_barras').style.borderTop = 'none';
    document.getElementById('cod_barras').style.borderRight = 'none';
    document.getElementById('cod_barras').style.borderLeft = 'none';

    document.getElementById('valor_unidade').style.borderBottom = '1px solid #9e9e9e';  
    document.getElementById('valor_unidade').style.borderTop = 'none';
    document.getElementById('valor_unidade').style.borderRight = 'none';
    document.getElementById('valor_unidade').style.borderLeft = 'none';
}

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