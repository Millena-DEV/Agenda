<?php

$host = "localhost";
$user = "postgres";
$pass = "root";
$dbname = "Contatos";
$port = 5432;

try{
    //Conexão com a porta
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);

    //Conexão sem a porta
    // $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);

    //echo "Conexão com banco de dados realizado com sucesso!";
}  catch(PDOException $err){
    echo "Erro: Conexão com banco de dados não realizado com sucesso. Erro gerado " . $err->getMessage();
}