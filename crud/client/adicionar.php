<?php
//header
include_once '../header.php';

?>




<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light">Novo cliente</h3>
        <form onsubmit="return validar()" action="./create.php" method="POST">
            <div class="input-field col s12">
                <input onkeyup="return alteracor()" type="text" name="nome" id="nome">
                <label for="nome">Nome:</label>
            </div>
            <div onkeyup="return alteracor()" class="input-field col s12">
                <input  type="text" name="cpf" id="cpf">
                <label for="cpf">Cpf</label>
            </div>
            <div onkeyup="return alteracor()" class="input-field col s12">
                <input  type="text" name="email" id="email">
                <label for="email">Email</label>
            </div>

            <button  type="submit" name="btn-cadastrar" class="btn">Cadastrar</button>
            <a href="index.php" type="submit" class="btn green">Lista de clientes</a>
        </form>
    </div>

</div>


<script>

/*----------------------------Validação dos campos vazios------------------------------------*/

function validar() {
    
    
    
    let nome = document.getElementById('nome')
    let cpf = document.getElementById('cpf')
    let email = document.getElementById('email')
    

    
    
    if (nome.value == "") {
        alert('Preencha o campo NOME!');
        document.getElementById('nome').style.border = '1px solid red';
        return false
    }

    if (cpf.value == "") {
        alert('Preencha o campo CPF!');
        document.getElementById('cpf').style.border = '1px solid red';
        return false
    } 

    if (email.value == "") {
        alert('Preencha o campo EMAIL!');
        document.getElementById('email').style.border = '1px solid red';
        return false
    }


}
/*--------------- Altera a cor dos campos quando a validação é bem sucedida -----------------*/

function alteracor() {

    document.getElementById('nome').style.borderBottom = '1px solid #9e9e9e';  
    document.getElementById('nome').style.borderTop = 'none';
    document.getElementById('nome').style.borderRight = 'none';
    document.getElementById('nome').style.borderLeft = 'none';

    document.getElementById('cpf').style.borderBottom = '1px solid #9e9e9e';  
    document.getElementById('cpf').style.borderTop = 'none';
    document.getElementById('cpf').style.borderRight = 'none';
    document.getElementById('cpf').style.borderLeft = 'none';

    document.getElementById('email').style.borderBottom = '1px solid #9e9e9e';  
    document.getElementById('email').style.borderTop = 'none';
    document.getElementById('email').style.borderRight = 'none';
    document.getElementById('email').style.borderLeft = 'none';
}

</script>

<?php
//footer
include_once '../footer.php';

?>