<?php
session_start();
require 'con.php';

if(isset($_POST['usuario']) && !empty($_POST['usuario'])){
	
	$usuario = strtolower(addslashes($_POST['usuario']));
	$senha = md5(addslashes($_POST['senha']));
	$sql = "SELECT * FROM admuser WHERE senha='$senha' AND usuario='$usuario'";
	$sql = $pdo->query($sql);
	if($sql->rowCount()>0){
		$id = $sql->fetch();
		$_SESSION['id']=$id['id'];
		header("Location: index.php");
	}else{
	echo "Usuário ou Senha Errada";
	}
}
?>


<html>
<head>
<meta charset="UTF-8">
<title>Login </title></head>
<body>
<h1> Login </h1>

<form method="POST" >
Usuario:
<input type="text" name="usuario" /></br></br>
Senha:
<input type="password" name="senha" /></br></br>

<input type="submit" value="Entrar" /></br></br>
</body>
</html>
