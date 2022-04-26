<?php

include ("conexao.php");

$dados = filter_input_array(INPUT_GET, FILTER_DEFAULT);


$usuario_id = $_GET['usuario_id'];
$idendereco= $_GET['idendereco'];

$usuario_id = "DELETE from clientes
where usuario_id = ".$usuario_id;

$idEndereco = "DELETE from enderecos
where idendereco = ".$idEndereco;

