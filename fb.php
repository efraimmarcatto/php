<?php
session_start();
require 'Facebook/autoload.php';

$fb = new Facebook\Facebook([
	'app_id'=> '239101126782820',
	'app_secret'=> 'd8b39ced34f181e465acbcca700df98c',
	'default_graph_version'=>'v3.1'
]);

?>
