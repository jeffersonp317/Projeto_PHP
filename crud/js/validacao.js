/*-------------Valida os campos que estão vazios, não deixando sem preenchimento*/


function validar(evt) {
    
    evt.preventDefault();
    
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


function validar_prod() {

    let produto = document.getElementById('nome_produto')
    let barras = document.getElementById('cod_barras')
    let valor = document.getElementById('valor_unidade')


    if (produto.value == "") {
        alert('Preencha o campo NOME DO PRODUTO!');
        document.getElementById('nome_produto').style.border = '1px solid red';
        
    }

    if (barras.value == "") {
        alert('Preencha o campo CÓDIGO DE BARRAS!');
        document.getElementById('cod_barras').style.border = '1px solid red';
        
    }

    if (valor.value == "") {
        alert('Preencha o campo VALOR DA UNIDADE!');
        document.getElementById('valor_unidade').style.border = '1px solid red';
        
    }
}


/*-------------Valida os campos que estão vazios, não deixando sem preenchimento-------------*/
function alteracor() {

   

}



