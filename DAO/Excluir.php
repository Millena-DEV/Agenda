<?php

include ("conexao.php");

$dados = filter_input_array(INPUT_GET, FILTER_DEFAULT);

$usuario_id = $dados['usuario_id'];
$idendereco = $dados['usuario_id'];

$queryDeletaUsuario = "DELETE FROM clientes WHERE usuario_id = :usuario_id";

$queryDeletaEnderecos = "DELETE FROM enderecos WHERE idendereco = :idendereco";

$deletaUsuario = $conn->prepare($queryDeletaUsuario); 
$deletaUsuario->bindParam(':usuario_id', $usuario_id); 
$deletaUsuario->execute();

header("Location: ../index.php");
