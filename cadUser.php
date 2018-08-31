
<?php
session_start();
require 'con.php';

if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
		if( isset($_POST["nome"], $_POST["usuario"], $_POST["email"], $_POST["senha"]) && !empty($_POST["usuario"]) && !empty($_POST["senha"]))
		{

			$nome= addslashes($_POST["nome"]);
			$senha=md5(addslashes($_POST["senha"]));
			$usuario=strtolower(addslashes($_POST["usuario"]));
			$email=addslashes($_POST["email"]);
			$sql = "INSERT INTO admuser (id,nome,usuario,email,senha) VALUES (NULL,'$nome','$usuario','$email','$senha')";
			$sql = $pdo->query($sql);
			header("Location: listAdm.php");
		}

		echo "
		<html>
		<head>
		<meta charset='UTF-8'>
		<title>Cadastro Usuario ADM </title></head>
		<body>
		<a href='index.php'>Home</a> - <a href='logout.php'>LogOut</a></br>
		<h1> Cadastro de usuário </h1>

		<form method='POST' >
		Nome:
		<input type='text' name='nome' /></br></br>
		E-mail:
		<input type='email' name='email' /></br></br>
		Nome de usuario:
		<input type='text' name='usuario' /></br></br>
		Senha:
		<input type='password' name='senha' /></br></br>

		<input type='submit' value='Enviar' /></br></br>
		</body>
		</html>";
		}else{
			header("Location: index.php");
		}
		?>
