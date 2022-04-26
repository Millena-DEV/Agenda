function pesquisacep(valor) {

    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');
    
    //Verifica se campo cep possui valor informado.
    if (cep != "") {
    
        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        document.getElementById('cep').value = cep.substring(0,5)
            +"-"
            +cep.substring(5);
        } //end if.
        else {
            //cep é inválido.
            limpa_formulário_cep();
            alert("Formato de CEP inválido.");
        }
    } //end if.
    // TESTE