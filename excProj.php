<?php
	require 'con.php';
	if(isset($_GET['id']) && !empty($_GET['id'])){
		$id = $_GET['id'];
		$sql = "SELECT foto FROM projetos WHERE id='$id'";
		$sql = $pdo->query($sql);
		$sql = $sql->fetch();
		if($sql['foto']!='default.png'){
			unlink('imagens/'.$sql['foto']);
		}
		$sql = "DELETE FROM projetos WHERE id='$id'";
		$sql = $pdo->query($sql);
		
		header('Location: listProj.php');
	}else{
		header('Location: listProj.php');
		}
?>

