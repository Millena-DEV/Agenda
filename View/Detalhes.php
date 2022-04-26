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
        <table style="margin:30px;" id="tabela">
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

    $query_endereco = "SELECT * FROM enderecos WHERE idendereco = $id";
    $result_enderecos = $conn->prepare($query_endereco);
    $result_enderecos->execute();
    
    while ($row_enderecos = $result_enderecos->fetch(PDO::FETCH_ASSOC)){
        //var_dump($row_endereco);
        extract($row_enderecos);
        echo "<h1 style='margin: 15px;'> Endereço do contato: $id </h1>";
        echo "<td> $idendereco </td>";
        echo "<td> $cep </td>";
        echo "<td> $logradouro </td> ";
        echo "<td> $rua </td> ";
        echo "<td> $numero</td> ";
        echo "<tr>";
    }
    ?>

        </tr>
        </table>

        <a href="../index.php"> <button class="voltar"> Voltar </button> </a>
</body>

</html>

<!-- TESTE -->