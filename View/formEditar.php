<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Editar contato </title>

    <link rel="stylesheet" href="./styles/form.css">
    <script src="./scripts/validar.js"></script>

</head>

<?php

    include 'conectar.php';

    $usuario_id = $_POST['usuario_id'];
    $idEndereco = $_POST['idEndereco'];
    $nome = $_POST['nome'];
    $pessoa = $_POST['pessoa'];
    $contato = $_POST['contato'];
    $opcontato = $_POST['opContato'];
    $cep = $_POST['cep'];
    $logadouro = $_POST['logadouro'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];

?>

<table class="table">

<h1> Editar contato</h1> <hr>

<form name="form" class="form" action="Editar.php" method="post">

    <input type="hidden" name="usuario_id" value="<?php echo $usuario_id; ?>">

    <div class="form-areas">
      <label for="nome"> Nome: </label>
      <input type="text" name="nome" value="<?php echo $nome?>">
    </div>

    </div class="form-areas">
            <p class="input-radio">          
              <input type="radio" name="pessoa" value=<?php echo $pessoa?> onclick="Pessoa(this.value); ">
              <label> Pessoa Fisica </label>
              
              <input type="radio" name="pessoa" value="<?php echo $pessoa?>" onclick="Pessoa(this.value);">
              <label> Pessoa Juridica </label>           
            </p>
        </div>
        <div class="form-areas">
            <label for="documento"> Documento: </label>
            <input type="text" class="form-input" name="doc" />
        </div>
  
    </div class="form-areas">
          <p class="input-radio">          
            <input type="radio" name="contato" value="<?php echo $contato?>" onclick="Contato(this.value); ">
            <label> Telefone </label>
            
            <input type="radio" name="contato" value="<?php echo $contato?>" onclick="Contato(this.value);">
            <label> E-mail </label>           
          </p>
        </div>
        <div class="form-areas">
            <label for="contato"> Contato: </label>
            <input type="text" class="form-input" name="opContato" />
        </div>

    
<h1> Editar Endereço </h1> <hr>

<form name="form" class="form" action="Editar.php" method="post">

    <input type="hidden" name="idEndereco" value="<?php echo $idEndereco; ?>">

    <div class="form-areas">
      <label for="cep"> Cep: </label>
     <input type="text" name="cep" value="<?php echo $cep ?>">
    </div>

    <div class="form-areas">
      <label for="logadouro"> Logadouro: </label>
     <input type="text" name="logadouro" value="<?php echo $logadouro ?>">
    </div>

    <div class="form-areas">
      <label for="rua"> Rua: </label>
     <input type="text" name="rua" value="<?php echo $rua ?>">
    </div>

    <div class="form-areas">
      <label for="numero"> Número: </label>
     <input type="text" name="numero" value="<?php echo $numero ?>">
    </div>

   
    

    <button class="button_form" type="submit" onclick="return validar()"> Editar </button></a> <br> <br>
                
</form>        
</table>
