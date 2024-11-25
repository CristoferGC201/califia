<?php
require_once __DIR__ . '/vendor/autoload.php'; // Ruta relativa al archivo autoload.php

$client = new Google_Client();
$client->setClientId("516412769602-0gblhbepnbpudbaotq21kshbml9fa3i5.apps.googleusercontent.com");
$client->setClientSecret("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");
$client->setRedirectUri("http://localhost/califia/Proyecto/registro/Inicio%20de%20sesion/oauth/index.php");
$client->addScope("email");
$client->addScope("profile");