<?php
session_start();
require 'Facebook/autoload.php';

$fb = new Facebook\Facebook([
	'app_id'=> '',
	'app_secret'=> '',
	'default_graph_version'=>'v3.1'
]);

?>
