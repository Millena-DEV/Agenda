<?php
session_start(); //Iniciar a sessao

include_once ("DAO/conexao.php");

?>

<!DOCTYPE HTML>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title> Listar </title>
</head>

<body>
    <a href="index.php">Listar</a><br>
    <a href="View/formCadastro.php"> Novo Contato </a>

    <h1>Listar Usuários</h1>   

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
                    <th>Excluir</th>
                    <th>Editar</th>
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
        echo " <td> $doc </td> ";
        echo " <td> $contato </td> ";
        echo "<td> $opcontato </td> ";
        echo "  <td> Detalhes </td> ";
        echo " <td> <a href='View/formEditar.php?usuario_id=".$row_usuario['usuario_id'] ."'> Editar </a> </td>";
        echo " <td> <a href='View/modalExcluir.php?usuario_id=".$row_usuario['usuario_id'] ."'> Excluir </a> </td>";
        echo "<tr>";
    }
    ?>



</tr>
</body>

</html>