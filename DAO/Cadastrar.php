<?php

session_start(); 

ob_start();

include_once "conexao.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if(!empty($dados['CadUsuario'])){
    $query_usuario = "INSERT INTO clientes 
                (usuario_id,nome, pessoa, doc, contato, opContato) VALUES
                (:usuario_id,:nome, :pessoa, :doc, :contato, :opContato)";
    $cad_usuario = $conn->prepare($query_usuario);
    $cad_usuario->bindParam(':usuario_id', $dados['usuario_id']);
    $cad_usuario->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
    $cad_usuario->bindParam(':pessoa', $dados['pessoa'], PDO::PARAM_STR);   
    $cad_usuario->bindParam(':doc', $dados['doc'], PDO::PARAM_STR);
    $cad_usuario->bindParam(':contato', $dados['contato'], PDO::PARAM_STR);
    $cad_usuario->bindParam(':opContato', $dados['opContato'], PDO::PARAM_STR);
    $cad_usuario->execute();
    
    $query_endereco= "INSERT INTO enderecos 
                (idendereco,cep, logradouro, rua, numero) VALUES 
                (:idendereco, :cep, :logradouro, :rua, :numero)";
    $cad_endereco = $conn->prepare($query_endereco);   
    $cad_endereco->bindParam(':idendereco', $dados['idendereco']); 
    $cad_endereco->bindParam(':cep', $dados['cep'], PDO::PARAM_STR); 
    $cad_endereco->bindParam(':logradouro', $dados['logradouro'], PDO::PARAM_STR);
    $cad_endereco->bindParam(':rua', $dados['rua'], PDO::PARAM_STR);
    $cad_endereco->bindParam(':numero', $dados['numero'], PDO::PARAM_STR);    
    $cad_endereco->execute();


    $_SESSION['msg'] = "<p style='color: green;'>Usuário cadastrado com sucesso!</p>";

    header("Location: ../index.php");
}else{
    
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não cadastrado com sucesso!</p>";

   header("Location: ../index.php");
}

/*
CREATE TABLE clientes (
	usuario_id SERIAL PRIMARY KEY,
	nome VARCHAR(50),
	pessoa VARCHAR(50),
	doc VARCHAR(50),
	contato VARCHAR(50),
	opcontato VARCHAR(50)
);

CREATE TABLE enderecos (
	idendereco SERIAL PRIMARY KEY,
	cep VARCHAR(20),
	logradouro VARCHAR(20),
	rua VARCHAR(20),
	numero VARCHAR(20)
);*/