<meta charset="UTF-8">
<?php
$servername="localhost";
$bancodb="quizdb";
$usermysql="root";
$passmysql="senha123";
$sql="SELECT * FROM projetos";
$mysqlic = new mysqli($servername,$usermysql,$passmysql,$bancodb);

if($mysqlic->connect_error){
	die("Connect Failed: ".$mysqlic->connect_error);

	}
if ($result = $mysqlic->query($sql))
{

	while($row = $result->fetch_array())
	{
		$rows[] = $row;
	}
	foreach($rows as $row)
	{
		echo"ID: ".$row["id"]."</br>";
		echo"Nome: ".$row["nome"]."</br>";
		echo"Descrição:".$row["descricao"]."</br> ";
		echo"Foto:<img src='imagens/".$row["foto"]." 'height=100 width=100></br> ";
		echo" Votos: ".$row["votos"]."</br> </br> ";
	}
	$result->close();
}

$mysqlic->close();

?>
