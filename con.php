<?php

$dsn = "mysql:dbname=quizdb;host=localhost";
$dbuser = "root";
$dbpass = "senha123";


try{

	$pdo = new PDO($dsn,$dbuser,$dbpass);
}catch(PDOexception $e){

	echo "Falhou a conexão".$e->getMessage();
	
}

?>
