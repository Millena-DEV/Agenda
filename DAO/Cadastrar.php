<?php

session_start(); //Iniciar a sessao

//Limpar o buffer de saida
ob_start();

//Incluir a conexao com BD
include_once "conexao.php";

//Receber os dados do formulario
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//var_dump($dados);

//Verificar se o usuario clicou no botao
if(!empty($dados['CadUsuario'])){
    $query_usuario = "INSERT INTO clientes 
                (nome, pessoa, doc, contato, opContato) VALUES
                (:nome, :pessoa, :doc, :contato, :opContato)";
    $cad_usuario = $conn->prepare($query_usuario);
    $cad_usuario->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
    $cad_usuario->bindParam(':pessoa', $dados['pessoa'], PDO::PARAM_STR);   
    $cad_usuario->bindParam(':doc', $dados['doc'], PDO::PARAM_STR);
    $cad_usuario->bindParam(':contato', $dados['contato'], PDO::PARAM_STR);
    $cad_usuario->bindParam(':opContato', $dados['opContato'], PDO::PARAM_STR);
    $cad_usuario->execute();
    //var_dump($conn->lastInsertId());
    //Recuperar o ultimo id inserido
    $id_usuario = $conn->lastInsertId();
    echo 'aqui: '.$id_usuario;
    $query_endereco= "INSERT INTO enderecos 
                (cep, logradouro, numero, rua, bairro, cidade, uf, idendereco) VALUES 
                (:logradouro, :numero, :idendereco)";
    $cad_endereco = $conn->prepare($query_endereco);    
    $cad_endereco->bindParam(':logradouro', $dados['logradouro'], PDO::PARAM_STR);
    $cad_endereco->bindParam(':numero', $dados['numero'], PDO::PARAM_STR);
    $cad_endereco->bindParam(':idendereco', $id_usuario, PDO::PARAM_INT);
    $cad_endereco->execute();

    //Criar a variavel global para salvar a mensagem de sucesso
    $_SESSION['msg'] = "<p style='color: green;'>Usuário cadastrado com sucesso!</p>";

    //Redirecionar o usuario
   // header("Location: index.php");
   echo "<br> deu certo";
}else{
    //Criar a variavel global para salvar a mensagem de erro
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não cadastrado com sucesso!</p>";

    //Redirecionar o usuario
   // header("Location: index.php");
   echo "<br> deu errado";
}