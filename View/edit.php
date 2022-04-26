<?php
session_start();
include_once("../DAO/conexao.php");

$usuario_id = filter_input(INPUT_GET, 'usuario_id', FILTER_SANITIZE_NUMBER_INT);

$result_usuario = "SELECT * FROM usuarios WHERE usuario_id = '$usuario_id'";
$resultado_usuario = $conn->prepare($result_usuario);
$row_usuario->execute();
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>CRUD - Editar</title>		
	</head>
	<body>
		<a href="cad_usuario.php">Cadastrar</a><br>
		<a href="index.php">Listar</a><br>
		<h1>Editar Usuário</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<form method="POST" action="proc_edit_usuario.php">
			<input type="hidden" name="usuario_id" value="<?php echo $row_usuario['usuario_id']; ?>">
			
			<label>Nome: </label>
			<input type="text" name="nome" placeholder="Digite o nome completo" value="<?php echo $row_usuario['nome']; ?>"><br><br>
			
			<label>E-mail: </label>
			<input type="email" name="email" placeholder="Digite o seu melhor e-mail" value="<?php echo $row_usuario['email']; ?>"><br><br>
			
			<input type="submit" value="Editar">
		</form>
	</body>
</html>