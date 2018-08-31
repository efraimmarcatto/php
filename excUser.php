
<?php
	require 'con.php';
	if(isset($_GET['id']) && !empty($_GET['id'])){
		$id = $_GET['id'];
		$sql = "DELETE FROM admuser WHERE id='$id'";
		$sql = $pdo->query($sql);
		header('Location: listAdm.php');
	}else{
		header('Location: listAdm.php');
		}
?>

