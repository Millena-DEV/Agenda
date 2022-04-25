<?php
session_start(); //Iniciar a sessao
?>
<!DOCTYPE HTML>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title> Cadastro de contatos </title>
    <link rel="stylesheet" href="../components/styles/form.css">
    <link rel="stylesheet" href="../components/scripts/validar.js">
</head>

<body>
    <h1> Cadastrar Contato </h1>
    <hr>

    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>

    <form method="POST" action="../DAO/Cadastrar.php">

        <div class="form-areas">
        <label>Nome: </label>
        <input type="text" name="nome" id="nome" placeholder="Nome do usuário"><br><br>
        </div>

        <!-- tipo pessoa -->
        <div class="form-group">
        <div class="form-areas">
          <p class="p-title"> Qual o tipo de cliente? </p>
        </div>
            <p class="input-radio">          
              <input type="radio" name="pessoa" value="fisica" onclick="Pessoa(this.value); ">
              <label> Pessoa Fisica </label>
              
              <input type="radio" name="pessoa" value="juridica" onclick="Pessoa(this.value);">
              <label> Pessoa Juridica </label>           
            </p>
        </div>
     
        <!-- <div id="fisica" style="display: none;">
                          
          <div class="form-areas">
            <label for="cpf"> CPF: </label>
            <input type="text" maxlength="14" id="cpf" name="doc" >
            <span id="resposta"> </span><br><br>
          </div>
        </div>

        <div id="juridica" style="display: none;">                  
        
            <div class="form-areas">
              <label for="cnpj"> CNPJ: </label>
              <input type="text" class="form-input" maxlength="18" id="cnpj" name="doc" onblur="if(!validarCNPJ(this.value)){alert('CNPJ é inválido'); this.value='';}">
            </div>
        </div> -->

        Documento <input type="text" class="form-input" name="doc" placeholder="email@gmail.com" title="Digite o email." />

        <!-- tipo contato -->
        <div class="form-group">
        <div class="form-areas">
          <p class="p-title"> Qual o tipo de contato? </p>
        </div>
          <p class="input-radio">          
            <input type="radio" name="contato" value="telefone" onclick="Contato(this.value); ">
            <label> Telefone </label>
            
            <input type="radio" name="contato" value="email" onclick="Contato(this.value);">
            <label> E-mail </label>           
          </p>
        </div>

        <!-- <div id="telefone" style="display: none;">
          <div class="form-areas">
            <label for="telefone"> Telefone: </label>
            <input type="text" class="form-input" maxlength="15" name="opContato" patern="(\(?\d{2}\)?\s)?(\d{4,5}\-\d{4})"
            placeholder="(xx) xxxxx-xxxx" />
          </div>
        </div>

        <div id="email" style="display: none;">                  
            <div class="form-areas">
              <label for="email"> E-mail: </label>
              <input type="text" class="form-input" name="opContato" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" 
              placeholder="email@gmail.com" title="Digite o email." />
            </div>
        </div> -->

        Contato <input type="text" class="form-input" name="opContato" placeholder="email@gmail.com" title="Digite o email." />


         <!-- endereco -->      
         <div class="form-areas">
          <label for="cep"> CEP: </label>
          <input name="cep" type="text" id="cep" class="mascCEP" value="" size="10" maxlength="9"
           onblur="pesquisacep(this.value);" /></label><br />
        </div>
        
        <div class="form-areas">
          <label for="logradouro"> Logradouro: </label>
          <input type="text" class="form-input" name="logradouro" pattern="[A-Za-z].{2,}"  required />
        </div>

        <div class="form-areas">
          <label for="numero"> Número: </label>
          <input type="text" class="form-input" name="numero"  required />
        </div>

        <div class="form-areas">
          <label for="rua"> Rua: </label>
          <input name="rua" type="text" id="rua" size="60" /></label><br />
        </div>

        <div class="form-areas">
          <label for="bairro"> Bairro: </label>
          <input name="bairro" type="text" id="bairro" size="40" /></label><br />
        </div>

        <div class="form-areas">
          <label for="cidade"> Cidade: </label>
          <input name="cidade" type="text" id="cidade" size="40" /></label><br />
        </div>

        <div class="form-areas">
          <label for="uf"> Estado: </label>
          <input name="uf" type="text" id="uf" size="2" /></label><br />
        </div>

        <input type="submit" class="button_form" value="Cadastrar" name="CadUsuario">
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="../components/scripts/validar.js"> </script>

</body>

</html>