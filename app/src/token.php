<?php

require_once('includes/oauth/server.php');
//request token
$server->handleTokenRequest(OAuth2\Request::createFromGlobals())->send();


?>