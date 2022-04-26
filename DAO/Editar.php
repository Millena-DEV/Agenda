<?php

include("conexao.php");

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$usuario_id = $dados['usuario_id'];
$idendereco = $dados['usuario_id'];


$queryUpdateClientes = "UPDATE  clientes
        SET (nome= :nome  pessoa= :pessoa doc= :doc contato= :contato opContato=:opContato )
        WHERE usuario_id= :usuario_id";


$queryUpdateClientes = $conn->prepare($queryUpdateClientes); 
$queryUpdateClientes->bindParam(':usuario_id', $usuario_id); 
$queryUpdateClientes->execute();

$queryUpdateEnderecos = "UPDATE  enderecos
SET (cep=:cep logradouro = :logadouro rua = :rua numero= :numero ) 
WHERE idEndereco = :idendereco";


$queryUpdateEnderecos = $conn->prepare($queryUpdateEnderecos); 
$queryUpdateEnderecos->bindParam(':usuario_id', $usuario_id); 
$queryUpdateEnderecos->execute();