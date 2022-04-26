<?php

include("../DAO/conexao.php");

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$id = filter_input(INPUT_GET,'usuario_id',FILTER_SANITIZE_NUMBER_INT);
print_r($dados);
$usuario_id = $dados['usuario_id'];
$idendereco = $dados['usuario_id'];



$queryUpdateClientes = "UPDATE clientes
SET  nome=:nome, pessoa=:feia, doc=:doc, contato=:contato, opcontato=:opcontato
WHERE usuario_id=.'$id'";
$queryUpdateClientes = $conn->prepare($queryUpdateClientes); 
$queryUpdateClientes->bindParam('usuario_id', $usuario_id); 
$queryUpdateClientes->execute();
echo 'falou';
/*
$queryUpdateEnderecos = "UPDATE  enderecos
SET (cep=:cep, logradouro = :logradouro, rua = :rua, numero= :numero ) 
WHERE idEndereco = :idendereco";
$queryUpdateEnderecos = $conn->prepare($queryUpdateEnderecos); 
$queryUpdateEnderecos->bindParam(':usuario_id', $usuario_id); 
$queryUpdateEnderecos->execute();*/
/* TESTE */