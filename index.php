<?php 
require 'fb.php';
require 'con.php';

?>
<meta charset="UTF-8">
<?php

if(isset($_SESSION['id']) && !empty($_SESSION['id']))
	{
	$id = $_SESSION['id'];
	$sql="SELECT * FROM admuser WHERE id='$id'";
	$sql = $pdo->query($sql);
	$sql = $sql->fetch();
	$nome = $sql['nome'];
	echo "
	<head><title>Bem Vindo $nome!</title></head>
	<body>
	<h3>
	<a href='listProj.php'>Lista de Projetos</a> </br>
	<a href='listAdm.php'>Lista de Administradores</a> </br>
	<a href='logout.php'>Logout</a> </br>
	</h3>
	</body>";


		
	}else{
		
		if(isset($_SESSION['fb_access_token']) && !empty($_SESSION['fb_access_token']))
		{
			
				$res = $fb->get('/me?fields=email,name,id', $_SESSION['fb_access_token']);
				$r = json_decode($res->getBody());
				$fbname = $r->name;
				$fbname = explode(' ',trim($fbname));
				$fbname = $fbname[0];
			echo'<table border="0" width="100%">
					<tr>
						<th width="90%"><a href="login.php">Adm Login</a></th>
						<th>Logado como '.$fbname.' - <a href="sairface.php">Sair</a></th>
					</tr></table><hr/>';
		}

	echo'<table border="0" width="100%">
			<tr>
				<th>Nome</th>
				<th>Descrição</th>
				<th>Foto</th>
				<th>Votos</th>
				<th>Ações</th>
			</tr>';
	$sql="SELECT * FROM projetos";
	$sql=$pdo->query($sql);
	if($sql->rowCount() > 0){
		foreach($sql->fetchAll() as $projeto)
		{
			echo'<tr>';
			echo'<th> '.$projeto["nome"].'</th>';
			echo'<th>'.$projeto["descricao"].'</th> ';
			echo'<th><img src="imagens/'.$projeto["foto"].' "></th> ';
			echo'<th>'.$projeto["votos"].'</th> ';
			echo'<th><a href="votar.php?id='.$projeto['id'].'">Votar</a></th>';
			echo'</tr>';
		}
	}
	echo '</table>';
	}
?>

