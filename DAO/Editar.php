<?php

include_once "conexao.php";

$dados = filter_input_array(INPUT_GET, FILTER_DEFAULT);

$usuario_id = $_GET['usuario_id'];
$idEndereco= $_GET['idEndereco'];

$query_cliente="UPDATE  clientes
        SET (nome, pessoa, doc, contato, opContato) = 
        (:nome, :pessoa, :doc, :contato, :opContato)
        WHERE cod= '$usuario_id'";

        
$query_endereco="UPDATE  enderecos
SET (cep, logradouro, rua, numero) = 
(:cep, :logradouro, :rua, :numeroo)
WHERE cod= '$idEndereco'";