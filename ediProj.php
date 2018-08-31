
<?php
	require 'con.php';
	if(isset($_GET['id']) && !empty($_GET['id'])){
		
		$id = $_GET['id'];
		$sql = "SELECT * FROM projetos WHERE id = '$id'";
		$sql = $pdo->query($sql);
		$sql = $sql->fetch();
		$nome = $sql['nome'];
		$descricao = $sql['descricao'];
		$nomearquivo = $sql['foto'];
		if(isset($_POST['nome']) && !empty($_POST['nome'])){

			$nome = addslashes($_POST['nome']);
			$descricao = addslashes($_POST['descricao']);
			$sql = "UPDATE projetos SET nome='$nome', descricao='$descricao' WHERE id='$id'";
			$sql = $pdo->query($sql);

			if(isset($_FILES['foto']) && !empty($_FILES['foto'])){
			
				$imagem = $_FILES['foto'];
				move_uploaded_file($imagem['tmp_name'],'imagens/'.$nomearquivo);
				
				}
		
			header('Location: listProj.php');
		}
			
		}else{
			header('Location: listProj.php');
	}



?>
<html>
<head>
<title>Cadastro de Projeto</title>
</head>
<body>
<h1>Cadastro de Projetos </h1> 
<form method='POST' enctype='multipart/form-data'>
Nome:
<input type='text' name='nome'value="<?php echo $nome?>"/> </br> </br>
Descrição:
<input type='text' name='descricao'value="<?php echo $descricao?>"/></br> </br> 
Foto: 
<input type='file' name='foto'/></br> </br> 
<input type='submit' value='Enviar'/></br> </br> 
</body>
</html>

