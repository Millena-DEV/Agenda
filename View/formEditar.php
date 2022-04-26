<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Editar contato </title>

  <link rel="stylesheet" href="../components/styles/form.css">

</head>

<?php

  include("../DAO/conexao.php");

<<<<<<< Updated upstream
  $query_usuarios = "SELECT usuario_id, nome, pessoa, doc, contato, opcontato
                      FROM clientes
                      ORDER BY usuario_id ASC";
  $result_usuarios = $conn->prepare($query_usuarios);
  $result_usuarios->execute();
=======
$query_usuarios = "SELECT usuario_id, nome, pessoa, doc, contato, opcontato
                    FROM  clientes
                    WHERE usuario_id = :usuario_id
                    ORDER BY usuario_id ASC";
$result_usuarios = $conn->prepare($query_usuarios);
$result_usuarios->execute();
>>>>>>> Stashed changes

  while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
    //var_dump($row_usuario);
    extract($row_usuario);

  $query_endereco = "SELECT idendereco, cep, logadouro, numero, rua
    FROM enderecos
    ORDER BY idendereco ASC";
    $result_enderecos = $conn->prepare($query_endereco);
    $result_enderecos->execute();

    while ($row_endereco = $result_enderecos->fetch(PDO::FETCH_ASSOC)){
    //var_dump($row_usuario);
    extract($row_endereco);
    }
  
}

?>

<table class="table">

  <h1> Editar contato</h1>
  <hr>

  
  

  <form name="form" class="form" action="../DAO/Editar.php?usuario_id=".$row_usuario['usuario_id'] ."'" method="POST">
  


    <input type="hidden" name="usuario_id" value="<?php echo $usuario_id; ?>">

    <div class="form-areas">
      <label for="nome"> Nome: </label>
      <input type="text" name="nome" value="<?php echo $nome; ?>">
    </div>

    </div class="form-areas">
    <p class="input-radio">
      <input type="radio" name="pessoa" value="<?php echo $pessoa; ?> onclick=" Pessoa(this.value); ">
              <label> Pessoa Fisica </label>
              
              <input type=" radio" name="pessoa" value="<?php echo $pessoa; ?>" onclick="Pessoa(this.value);">
      <label> Pessoa Juridica </label>
    </p>
    </div>
    <div class="form-areas">
      <label for="documento"> Documento: </label>
      <input type="text" class="form-input" name="doc" value="<?php echo $doc; ?>" />
    </div>

    </div class="form-areas">
    <p class="input-radio">
      <input type="radio" name="contato" value="<?php echo $contato; ?>" onclick="Contato(this.value); ">
      <label> Telefone </label>

      <input type="radio" name="contato" value="<?php echo $contato; ?>" onclick="Contato(this.value);">
      <label> E-mail </label>
    </p>
    </div>
    <div class="form-areas">
      <label for="contato"> Contato: </label>
      <input type="text" class="form-input" name="opContato" value="<?php echo $opcontato; ?>" />
    </div>

<<<<<<< Updated upstream
=======
    <?php

    $query_enderecos = "SELECT idendereco, cep, logadouro, numero, rua
    FROM enderecos
    WHERE idendereco = :idendereco
    ORDER BY idendereco ASC";
    $result_enderecos = $conn->prepare($query_enderecos);
    $result_enderecos->execute();

    while ($row_endereco = $result_enderecos->fetch(PDO::FETCH_ASSOC)) {
      //var_dump($row_usuario);
      extract($row_endereco);
    }
    ?>

>>>>>>> Stashed changes
    <h1> Editar Endereço </h1>
    <hr>

    <input type="hidden" name="idendereco" value="<?php echo $idendereco; ?>">

    <div class="form-areas">
      <label for="cep"> Cep: </label>
      <input type="text" name="cep" value="<?php echo $cep; ?>">
    </div>

    <div class="form-areas">
      <label for="logadouro"> Logadouro: </label>
      <input type="text" name="logadouro" value="<?php echo $logadouro; ?>">
    </div>

    <div class="form-areas">
      <label for="rua"> Rua: </label>
      <input type="text" name="rua" value="<?php echo $rua; ?>">
    </div>

    <div class="form-areas">
      <label for="numero"> Número: </label>
      <input type="text" name="numero" value="<?php echo $numero; ?>">
    </div>

<<<<<<< Updated upstream
    <button class="button_form" type="submit" onclick="return validar()"> Editar </button></a> <br> <br>

=======


    <button class="button_form" type="submit" onclick="return validar()"> <?php 
                    $url = "../DAO/Editar.php?usuario_id=".$_GET['usuario_id'];
                    echo '<a href="'.$url.'" class="modal__cta modal__cta--red"> Editar </a>';
                ?>   Editar </button></a> <br> <br>

   
>>>>>>> Stashed changes
  </form>
  
  </table>