<?php

if( isset($_POST["nome"], $_POST["usuario"], $_POST["email"], $_POST["senha"]) && !empty($_POST["usuario"]) && !empty($_POST["senha"]))
{

	$servername="localhost";
	$bancodb="quizdb";
	$usermysql="root";
	$passmysql="senha123";
	$nome=$_POST["nome"];
	$senha=md5($_POST["senha"]);
	$usuario=$_POST["usuario"];
	$email=$_POST["email"];
	$sql = "INSERT INTO admuser (id,nome,usuario,email,senha) VALUES (NULL,'$nome','$usuario','$email','$senha')";
	$mysqlic = new mysqli($servername,$usermysql,$passmysql,$bancodb);

	if ($mysqlic->connect_error)
	{
		die("Conexão Falhou".$mysqlic->connect_error);
	
	}
	//echo "Conectou!</br>";
	
	if ($mysqlic->query($sql) == TRUE)
	{
	echo "<html><body><h1>Usuário cadastrado</h1></body></html>";
	}else{
	echo "Error: ". $sql . "</br>" . $mysqlic->error;
	}
	$mysqlic->close();
}
else
{
echo "
<html>
<head>
<meta charset='UTF-8'>
<title>Cadastro Usuario ADM </title></head>
<body>
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
}
?>
