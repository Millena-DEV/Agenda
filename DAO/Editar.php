<?php

include("conexao.php");

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$usuario_id = $_POST['usuario_id'];
$nome = $_POST['nome'];
$pessoa = $_POST['pessoa'];
$doc = $_POST['doc'];
$contato = $_POST['contato'];
$opContato = $_POST['opContato'];
$query_clientes = "UPDATE  clientes
        SET (nome=" . $nome . "', pessoa=" . $pessoa . "', doc=" . $doc . "', contato=" . $contato . "', opContato=" . $opContato . "')
        WHERE usuario_id= " . $usuario_id;

$idendereco = $_POST['idendereco'];
$cep = $_POST['cep'];
$logadouro = $_POST['logadouro'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];

$query_enderecos = "UPDATE  enderecos
SET (cep= " . $cep . "', logradouro = " . $logadouro . "', rua = " . $rua . "', numero= " . $numero . "') = 
(:cep, :logradouro, :rua, :numeroo)
WHERE idEndereco = " . $idendereco;