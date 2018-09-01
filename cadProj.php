<?php
	require 'con.php';
	session_start();


	if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
		$idadm = $_SESSION['id'];
			if(isset($_POST['nome']) && !empty($_POST['nome']) ){
				$nome = addslashes($_POST['nome']);
				$descricao = addslashes($_POST['descricao']);
				if(isset($_FILES['foto']) && !empty($_FILES['foto']['tmp_name'])){
						$imagem = $_FILES['foto'];
						$nomearquivo = md5($nome.rand(0,99)).strtolower(substr($imagem['name'],-4));
						echo $nomearquivo;
						if(strtolower(substr($nomearquivo,-3)) =='png' || strtolower(substr($nomearquivo,-3) == 'jpg'))
						{
						echo '</br> caminho servidor > '.$imagem['tmp_name'];
						//	move_uploaded_file($imagem['tmp_name'],'imagens/'.$nomearquivo);
						echo '</br>moveu arquivo';
						//parametros para redimensionamento da imagem

						list($imgW, $imgH) = getimagesize("imagens/$nomearquivo");
						$maxW = 200;
						$maxH = 200;
						$ratio = $imgW / $imgH;
						if($maxW / $maxH > $ratio)
						{
							$maxW = $maxH * $ratio;
						}else
						{
							$maxH = $maxW / $ratio;

						}
						
						$final = imagecreatetruecolor($maxW,$maxH);

						if(substr($nomearquivo,-3) == 'png' )
						{
							$final = imagesavealpha($final,true);
							$trans_colour = imagecolorallocatealpha($final, 0, 0, 0, 127);
							imagefill($final, 0, 0, $trans_colour);
							$imgpng = imagecreatefrompng('imagens/'.$nomearquivo);
							
							imagecopyresampled($final, $imgpng,0,0,0,0,$maxW,$maxH,$imgW,$imgH);
							imagepng($final,'imagens/'.$nomearquivo);
							echo '</br>Arquivo png';
						}else
						{
							if(substr($nomearquivo,-3) == 'jpg')
							{
								$imgjpg = imagecreatefromjpeg('imagens/'.$nomearquivo);	
								imagecopyresampled($final, $imgjpg,0,0,0,0,$maxW,$maxH,$imgW,$imgH);
								imagejpeg($final,'imagens/'.$nomearquivo,100);
								echo '</br>Arquivo jpg';
							}
							
							

						}
						}
				}
				if(substr($nomearquivo,-3)!='png')
				{
					if(substr($nomearquivo,-3)!='jpg')
					{
						$nomearquivo = "default.png";
					}
				}
				echo 'Arquivo para banco > '.$nomearquivo;
				$sql = "INSERT INTO projetos (id_adm,nome,descricao,foto,votos) VALUES ('$idadm','$nome','$descricao','$nomearquivo',0)";
				$sql = $pdo->query($sql);
				header('Location: listProj.php');
				}
				echo "
				
				<html>
				<head>
				<title>Cadastro de Projeto</title>
				</head>
				<body>
				<h1>Cadastro de Projetos - </h1> 
				<form method='POST' enctype='multipart/form-data'>
				Nome:
				<input type='text' name='nome'/> </br> </br>
				Descrição:
				<input type='text' name='descricao'/></br> </br> 
				Foto: 
				<input type='file' name='foto'/></br> </br> 
				<input type='submit' value='Enviar'/></br> </br> 
				</body>
				</html>
								
				";
}else{
header("Location: login.php");
}

?>

