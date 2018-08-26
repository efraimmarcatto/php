<?php
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$imagem = $_FILES['foto'];
$ext = substr($imagem['name'], -4);
$nomearquivo = md5($nome.rand(0,99)).$ext;
$servername="localhost";
$bancodb="quizdb";
$usermysql="root";
$passmysql="senha123";
$sql = "INSERT INTO projetos (id,nome,descricao,foto) VALUES (NULL,'$nome','$descricao','$nomearquivo')";

if(isset($imagem['tmp_name'],$nome) && !empty($nome) && !empty($imagem['tmp_name']))
	{
	move_uploaded_file($imagem['tmp_name'],'imagens/'.$nomearquivo);
	$mysqlic = new mysqli($servername,$usermysql,$passmysql,$bancodb);
	if ($mysqlic->connect_error)
		{
			die("Conexão Falhou".$mysqlic->connect_error);
		}else
		{
			if ($mysqlic->query($sql) == TRUE)
			{
			
			echo "<html><body><h1>Projeto Cadastrado cadastrado</h1></body></html>";
			}
		}
	}else
	 {
	 echo"
	<html><head><title></title></head><body><h1>Cadastro de Projetos </h1></br> </br> <form method='POST' enctype='multipart/form-data'>Nome:<input type='text' name='nome'/> </br> </br>Descrição:<input type='memo' name='descricao'/></br> </br> Foto:<input type='file' name='foto'/></br> </br> <input type='submit' value='Enviar'/></br> </br> </body></html>";

	}	

?>
