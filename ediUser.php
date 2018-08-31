

<?php
	require 'con.php';
	if(isset($_GET['id']) && !empty($_GET['id'])){
		
		$id = $_GET['id'];
		$sql = "SELECT * FROM admuser WHERE id = '$id'";
		$sql = $pdo->query($sql);
		$sql = $sql->fetch();
		$nome = $sql['nome'];
		$usuario = $sql['usuario'];
		$email = $sql['email'];
		if(isset($_POST['nome']) && !empty($_POST['nome'])){

			$nome = addslashes($_POST['nome']);
			$email= addslashes($_POST['email']);
			$usuario= addslashes($_POST['usuario']);
			if(isset($_POST['senha']) && !empty($_POST['senha'])){
			$senha = md5($_POST['senha']);
			$sql = "UPDATE admuser SET nome='$nome', usuario= '$usuario', email='$email', senha='$senha' WHERE id='$id'";
			}else{
			$sql = "UPDATE admuser SET nome='$nome', usuario= '$usuario', email='$email' WHERE id='$id'";
			}
		
			$sql = $pdo->query($sql);
			header('Location: listAdm.php');
		}
			
		}else{
			header('Location: listAdm.php');
	}



?>
<html>
<head>
<title>Editar Usuario</title>
</head>
<body>
<h1>Editar Usuario </h1> 
<form method='POST' >
Nome:
<input type='text' name='nome' value="<?php echo $nome?>"/> </br> </br>
E-mail:
<input type='text' name='email' value="<?php echo $email?>"/></br> </br> 
Nome de Usuario: 
<input type='text' name='usuario' value="<?php echo $usuario?>"/></br> </br> 
Senha:
<input type='password' name='senha' /></br> </br> 

<input type='submit' value='Enviar'/></br> </br> 
</body>
</html>

