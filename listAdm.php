
<meta charset="UTF-8">
<?php
	require 'con.php';
	session_start();
if(!isset($_SESSION['id']) || empty($_SESSION['id'])){
	header("Location: index.php");
}
?>
<a href="cadUser.php">Cadastrar Administrador</a> - 
<a href="index.php">Home</a> - <a href="logout.php">LogOut</a></br>
<table border="0" width="100%">
	<tr>
		<th>Nome</th>
		<th>Nome de usuario</th>
		<th>E-mail</th>
		<th>Ações</th>
	</tr>
<?php
	$sql="SELECT * FROM admuser";
	$sql=$pdo->query($sql);
	if($sql->rowCount() > 0){

		foreach($sql->fetchAll() as $usuario)
		{
			echo'<tr>';
			echo'<td> '.$usuario["nome"].'</td>';
			echo'<td>'.$usuario["usuario"].'</td> ';
			echo'<td>'.$usuario["email"].'</td> ';
			echo'<td> <a href="ediUser.php?id='.$usuario["id"].'">Editar</a> - <a href="excUser.php?id='.$usuario["id"].'">Excluir</a> </td> ';
			echo'</tr>';
		}
}
?>
</table>
