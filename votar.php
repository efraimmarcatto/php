<?php
require 'fb.php';
require 'con.php';
if(!isset($_GET['id']) || empty($_GET['id'])){
	header("Location: index.php");
}
$idp = $_GET['id'];
if(isset($_SESSION['fb_access_token']) && !empty($_SESSION['fb_access_token']))
{
		
		$res = $fb->get('/me?fields=email,name,id', $_SESSION['fb_access_token']);

		$r = json_decode($res->getBody());
		$idfu = $r->id;
		$sql = "SELECT * FROM convotos WHERE id_uface='$idfu'";
		$sql = $pdo->query($sql);
		if($sql->rowCount()>0)
		{
		
			foreach($sql->fetchAll() as $id)
			{
				if(!$id['id_proj']==$idp)
				{
				
					$sql = "UPDATE projetos SET votos = votos  + 1 WHERE id = $idp";
					$sql = $pdo->query($sql);
					$sql = "INSERT INTO convotos (id_proj,id_uface VALUES ($idp, id_uface='$idfu')";
					$sql = $pdo->query($sql);
					header("Location: index.php");
				
				}
			}	
			
			echo 'Você já voltou nesse projeto!</br><a href="index.php">Projetos</a>';
	
		}else{
					$sql = "UPDATE projetos SET votos = votos  + 1 WHERE id = $idp";
					$sql = $pdo->query($sql);
					$sql = "INSERT INTO convotos (id_proj,id_uface VALUES ($idp, id_uface='$idfu')";
					$sql = $pdo->query($sql);
										
					header("Location: index.php");
		}

		
}else {
	header("Location: facelogin.php");
}

?>
