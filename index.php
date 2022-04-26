<?php
session_start(); //Iniciar a sessao

include_once ("DAO/conexao.php");

?>

<!DOCTYPE HTML>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title> Listar </title>
   
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="components/styles/index.css">


</head>

<body>
     <a class="new-a" href="View/formCadastro.php"> <button class="new"> Novo Contato </button> </a>

    <div class='container'>        
        <table id="tabela">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Tipo de Pessoa</th>
                    <th>Documento</th>
                    <th>Tipo de Contato</th>
                    <th>Contato</th>
                    <th>Endereço</th>
                    <th>Editar</th>
                    <th>Excluir</th>                    
                </tr>
            </thead>
            <tbody> 
                <tr>

                <?php
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }

                $query_usuarios = "SELECT usuario_id, nome, pessoa, doc, contato, opcontato
                                FROM clientes
                                ORDER BY usuario_id ASC";
                $result_usuarios = $conn->prepare($query_usuarios);
                $result_usuarios->execute();

                while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)){
                    //var_dump($row_usuario);
                    extract($row_usuario);
                    echo "<td> $usuario_id </td>";
                    echo "<td> $nome </td>";
                    echo "<td> $pessoa </td> ";
                    echo "<td> $doc </td> ";
                    echo "<td> $contato </td> ";
                    echo "<td> $opcontato </td> ";
                    echo "<td> <a href='View/Detalhes.php?usuario_id=".$row_usuario['usuario_id'] ."'> <i class='bx bxs-user-detail bx-sm'></i> </a> </td> </td> ";
                    echo "<td> <a href='View/formEditar.php?usuario_id=".$row_usuario['usuario_id'] ."'> <i class='bx bxs-edit bx-sm'></i> </a> </td>";
                    echo "<td> <a href='View/modalExcluir.php?usuario_id=".$row_usuario['usuario_id'] ."'> <i class='bx bxs-trash bx-sm'></i> </a> </td>";
                    echo "<tr>";
                }
                ?>

            </tr>

        </table>

<p style="margin-bottom: 30px;"> </p>

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
    
    $query_enderecos = "SELECT idendereco, cep, logradouro, rua, numero
                    FROM enderecos
                    ORDER BY idendereco ASC";
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