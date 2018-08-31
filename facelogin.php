<?php
require 'fb.php';
$helper = $fb->getRedirectLoginHelper();

$permissions = array('email');

$loginurl = $helper->getLoginUrl('http://127.0.0.1:5000/callback.php', $permissions);


?>

<a href="<?php echo htmlspecialchars($loginurl);?>">Conectar com o Facebook</a>
