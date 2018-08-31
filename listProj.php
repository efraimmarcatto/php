<meta charset="UTF-8">
<?php
	require 'con.php';
	session_start();
if(!isset($_SESSION['id']) || empty($_SESSION['id'])){
	header("Location: index.php");
}
?>
<a href="cadProj.php">Cadastrar Projeto</a> - 
<a href="index.php">Home</a> - <a href="logout.php">LogOut</a></br>
<table border="0" width="100%">
	<tr>
		<th>Nome</th>
		<th>Descrição</th>
		<th>Foto</th>
		<th>Votos</th>
		<th>Added by</th>
		<th>Ações</th>
	</tr>
<?php
	$sql="SELECT * FROM projetos";
	$sql=$pdo->query($sql);
	if($sql->rowCount() > 0){
		foreach($sql->fetchAll() as $projeto)
		{
			$idadm = $projeto['id_adm'];
			$nomeadm = $pdo->query("SELECT nome FROM admuser WHERE id = '$idadm'");
			$nomeadm = $nomeadm->fetch();
			$nomeadm = $nomeadm['nome'];
			echo'<tr>';
			echo'<td> '.$projeto["nome"].'</td>';
			echo'<td>'.$projeto["descricao"].'</td> ';
			echo'<td><img src="imagens/'.$projeto["foto"].' "></td> ';
			echo'<td> '.$projeto["votos"].'</td> ';
			echo'<td> '.$nomeadm.'</td> ';
			echo'<td> <a href="ediProj.php?id='.$projeto["id"].'">Editar</a> - <a href="excProj.php?id='.$projeto["id"].'">Excluir</a> </td> ';
			echo'</tr>';
		}
}
?>
</table>
