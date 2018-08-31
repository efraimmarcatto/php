<?php
require 'fb.php';
$helper = $fb->getRedirectLoginHelper();

$permissions = array('email');

$loginurl = $helper->getLoginUrl('http://localhost/quiz/php/callback.php', $permissions);


?>

<a href="<?php echo htmlspecialchars($loginurl);?>">Conectar com o Facebook</a>
