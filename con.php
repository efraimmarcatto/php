<?php

$dsn = "pgsql:host=ec2-54-235-86-226.compute-1.amazonaws.com dbname=d67e3i82456bvo user=wpqjoarmffoamb password=c73b3f22bba344b9c52d1185039407eec46eda836ffe2bbfa022104a08ebc9cb";


try{

	$pdo = new PDO($dsn);
}catch(PDOexception $e){

	echo "Falhou a conexão".$e->getMessage();
	
}

?>
