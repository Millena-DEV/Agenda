<?php
  session_start(); //Iniciar a sessao
?>

<!DOCTYPE HTML>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title> Cadastro de contatos </title>
    <link rel="stylesheet" href="../components/styles/form.css">
    
    <script src="../components/scripts/valida_cpf_cnpj.js"></script>
    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    <script src="../components/scripts/mascara_doc.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
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
        <div class="form-areas">
          <p class="p-title"> Qual o tipo de cliente? </p>
        </div>
            <p class="input-radio">          
              <input type="radio" name="pessoa" value="fisica" onclick="Pessoa(this.value); ">
              <label> Pessoa Fisica </label>
              
              <input type="radio" name="pessoa" value="juridica" onclick="Pessoa(this.value);">
              <label> Pessoa Juridica </label>           
            </p>
        
        <div class="form-areas">
            <label for="documento"> Documento: </label>
            <input type="text" class="cpf_cnpj" name="doc" >
        </div>

        <!-- tipo contato -->
        
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
        
        <div class="form-areas">
            <label for="contato"> Contato: </label>
            <input type="text" class="form-input" name="opContato" />
        </div>

         <!-- endereco -->      
        <div class="form-areas">
          <label for="cep"> CEP: </label>
          <input name="cep" type="text" id="cep" class="mascCEP" value="" onkeypress="$(this).mask('00.000-000')" /></label><br />
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

        <input type="submit" class="button_form" value="Cadastrar" name="CadUsuario">
    </form>

    <script src="../components/scripts/valida_cpf_cnpj.js"></script>
    <script src="https://code.jquery.com/jquery-latest.min.js"></script>

</body>

</html>

<!-- TESTE -->