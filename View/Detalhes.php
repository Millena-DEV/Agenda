<?php
session_start(); //Iniciar a sessao

include_once ("../DAO/conexao.php");

?>

<!DOCTYPE HTML>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title> Listar </title>
   
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../components/styles/index.css">

</head>

<body>

    <div class='container'>        
        <table id="tabela">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>CEP</th>
                    <th>Logradouro</th>
                    <th>Rua</th>
                    <th>Numero</th>                
                </tr>
            </thead>
            <tbody> 
                <tr>

    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }

    $id = $_GET['usuario_id'];      

    $query_enderecos = "SELECT cep, logradouro, rua, numero
                    FROM enderecos
                    WHERE $id";
    $result_enderecos = $conn->prepare($query_enderecos);
    $result_enderecos->execute();

    while ($row_enderecos = $result_enderecos->fetch(PDO::FETCH_ASSOC)){
        //var_dump($row_endereco);
        extract($row_enderecos);
        echo "<td> $idendereco </td>";
        echo "<td> $cep </td>";
        echo "<td> $logradouro </td> ";
        echo "<td> $rua </td> ";
        echo "<td> $numero</td> ";
        echo "<tr>";
    }
    ?>

</tr>
</body>

</html>