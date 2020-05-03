<?php

include_once 'user_session.php';

$userSession = new UserSession();
$userSession->closeSession();
echo dirname(__DIR__);
header("location: ../index.php");
