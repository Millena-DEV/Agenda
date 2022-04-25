// ============= VALIDAÇÃO DE TIPOS

function Pessoa(tipo) {
    if (tipo=="fisica") {
    document.getElementById("fisica").style.display = "inline";
    document.getElementById("juridica").style.display = "none";
    } else {
    document.getElementById("fisica").style.display = "none";
    document.getElementById("juridica").style.display = "inline";
    }
}

function Contato(tipo) {
    if (tipo=="telefone") {
    document.getElementById("telefone").style.display = "inline";
    document.getElementById("email").style.display = "none";
    } else if(tipo=="email") {
    document.getElementById("telefone").style.display = "none";
    document.getElementById("email").style.display = "inline";
    }
}

// ============= MÁSCARA DE TELEFONE
const inputTel = document.querySelector('#OpTelefone')

inputTel.addEventListener('keypress', () => {
    let inputTelLength = inputTel.value.length

    if (inputTelLength == 0) {
         inputTel.value += '('
    } else if (inputTelLength == 3) {
        inputTel.value += ')'
    } else if (inputTelLength == 5) {
        inputTel.value += ' '
    } else if (inputTelLength == 10) {
        inputTel.value += '-'
    }
})

// MÁSCARA E VALIDAÇÃO DE CEP
function limpa_formulário_cep() {
    //Limpa valores do formulário de cep.
    document.getElementById('rua').value=("");
    document.getElementById('bairro').value=("");
    document.getElementById('cidade').value=("");
    document.getElementById('uf').value=("");
}

function meu_callback(conteudo) {
if (!("erro" in conteudo)) {
    //Atualiza os campos com os valores.
    document.getElementById('rua').value=(conteudo.logradouro);
    document.getElementById('bairro').value=(conteudo.bairro);
    document.getElementById('cidade').value=(conteudo.localidade);
    document.getElementById('uf').value=(conteudo.uf);
} //end if.
else {
    //CEP não Encontrado.
    limpa_formulário_cep();
    alert("CEP não encontrado.");
}
}

function pesquisacep(valor) {

//Nova variável "cep" somente com dígitos.
var cep = valor.replace(/\D/g, '');

//Verifica se campo cep possui valor informado.
if (cep != "") {

    //Expressão regular para validar o CEP.
    var validacep = /^[0-9]{8}$/;

    //Valida o formato do CEP.
    if(validacep.test(cep)) {

        document.getElementById('cep').value = cep.substring(0,5)
        +"-"
        +cep.substring(5);

        //Preenche os campos com "..." enquanto consulta webservice.
        document.getElementById('rua').value="...";
        document.getElementById('bairro').value="...";
        document.getElementById('cidade').value="...";
        document.getElementById('uf').value="...";

        //Cria um elemento javascript.
        var script = document.createElement('script');

        //Sincroniza com o callback.
        script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

        //Insere script no documento e carrega o conteúdo.
        document.body.appendChild(script);

    } //end if.
    else {
        //cep é inválido.
        limpa_formulário_cep();
        alert("Formato de CEP inválido.");
    }
} //end if.
else {
    //cep sem valor, limpa formulário.
    limpa_formulário_cep();
}
};

// ============= MÁSCARA DE CPF
const input = document.querySelector('#cpf')

input.addEventListener('keypress', () => {
    let inputLength = input.value.length

    if (inputLength == 3 || inputLength == 7) {
        input.value += '.'
    }else if (inputLength == 11) {
        input.value += '-'
    }
})

// ============= MÁSCARA DE CNPJ
const Input = document.querySelector('#cnpj')

Input.addEventListener('keypress', () => {
    let InputLength = Input.value.length

    if (InputLength == 2 || InputLength == 6) {
        Input.value += '.'
    } else if (InputLength == 10) {
        Input.value += '/'
    } else if (InputLength == 15) {
        Input.value += '-'
    }
})

// ============= CPF VÁLIDO
function CPF(){
    "user_strict";
    
    function r(r){
        for(var t=null,n=0;9>n;++n)t+=r.toString().charAt(n)*(10-n);
        var i=t%11;
        return i=2>i?0:11-i
    }

    function t(r){
        for(var t=null,n=0;10>n;++n)t+=r.toString().charAt(n)*(11-n);
        var i=t%11;
        return i=2>i?0:11-i
    }
    
    var n="CPF Inválido",
    i="CPF Válido";

    this.gera=function(){
                    for(var n="",i=0;9>i;++i)n+=Math.floor(9*Math.random())+"";
                    var o=r(n),a=n+"-"+o+t(n+""+o);
                    return a
                },this.valida=function(o){
                                for(var a=o.replace(/\D/g,""),u=a.substring(0,9),f=a.substring(9,11),v=0;10>v;v++)
                                if(""+u+f==""+v+v+v+v+v+v+v+v+v+v+v)
                                return i;
                                
                                var c=r(u),e=t(u+""+c);
                                return f.toString()===c.toString()+e.toString()?i:n
                            }
}

var CPF = new CPF();

$("#cpf").keypress(function(){
    $("#resposta").html(CPF.valida($(this).val()));
});

$("#cpf").blur(function(){
     $("#resposta").html(CPF.valida($(this).val()));
});

// ================== CNPJ VÁLIDO
function validarCNPJ(cnpj) {
 
    cnpj = cnpj.replace(/[^\d]+/g,'');
 
    if(cnpj == '') return false;
     
    if (cnpj.length != 14)
        return false;
 
    // Elimina CNPJs invalidos conhecidos
    if (cnpj == "00000000000000" || 
        cnpj == "11111111111111" || 
        cnpj == "22222222222222" || 
        cnpj == "33333333333333" || 
        cnpj == "44444444444444" || 
        cnpj == "55555555555555" || 
        cnpj == "66666666666666" || 
        cnpj == "77777777777777" || 
        cnpj == "88888888888888" || 
        cnpj == "99999999999999")
        return false;
         
    // Valida DVs
    tamanho = cnpj.length - 2
    numeros = cnpj.substring(0,tamanho);
    digitos = cnpj.substring(tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(0))
        return false;
         
    tamanho = tamanho + 1;
    numeros = cnpj.substring(0,tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(1))
          return false;
           
    return true;   
}

function textValidar() {
    if(validarCNPJ(cnpj) == true) {
    document.querySelector('#respCNPJ').textContent = "CNPJ válido.";
} else {
    document.querySelector('#respCNPJ').textContent = "CNPJ inválido";
}
}