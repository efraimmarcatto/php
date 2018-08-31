<?php
require 'fb.php';
$helper = $fb->getRedirectLoginHelper();

$permissions = array('email');

$loginurl = $helper->getLoginUrl('https://phpfinal.herokuapp.com/callback.php', $permissions);


?>

<a href="<?php echo htmlspecialchars($loginurl);?>">Conectar com o Facebook</a>
