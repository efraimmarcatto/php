<?php 
require 'fb.php';

$helper = $fb->getRedirectLoginHelper();

try{
	$_SESSION['fb_access_token'] = (string) $helper->getAccessToken();

}catch(Facebook\Exceptions\FacebookResponseException $e){

	echo "Falhou! Erro:".$e->getMessage();

}catch(Facebook\Exceptions\FacebookSDKException $e){

	echo "Falhou! Erro SDK:".$e->getMessage();

}
header("Location: votar.php");	
?>
