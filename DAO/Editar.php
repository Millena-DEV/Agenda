<?php

include ("conexao.php");

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$usuario_id = $_POST['usuario_id'];
$idendereco= $_POST['idendereco'];

$query_cliente="UPDATE  clientes
        SET (nome, pessoa, doc, contato, opContato) = 
        (:nome, :pessoa, :doc, :contato, :opContato)
        WHERE cod= '$usuario_id'";

        
$query_endereco="UPDATE  enderecos
SET (cep, logradouro, rua, numero) = 
(:cep, :logradouro, :rua, :numeroo)
WHERE cod= '$idendereco'";