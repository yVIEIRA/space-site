<?php
	//Inicia a sessão do usuário
	SESSION_START();

	include "conexao.php";

	//Informações de Login e Senha vindas do formulário de Login
	$userLogin = $_POST["txtUsernameLog"];
	$userPass = $_POST["txtPasswordLog"];

	//String SQL para fazer a validação do Login do usuário
	$resulta = mysqli_query($con, "select * from jogador where USERNAME_JOGADOR = '$userLogin' and SENHA_JOGADOR = '$userPass'");

	//Condições de Confirmação de Login
	if ($resulta->num_rows > 0){
		$registro = mysqli_fetch_array($resulta);
		$fechar = mysqli_close($con);
		$_SESSION['userLogin'] = $userLogin;
		$_SESSION['userPass'] = $userPass;
		$_SESSION['logado'] = 1;
		header('Location: index.php');
	}
	else{
		$fechar = mysqli_close($con);
		echo "<script>alert('Login ou Senha Inválidos!') </script>";
		header('location: login.php');
	}
?>