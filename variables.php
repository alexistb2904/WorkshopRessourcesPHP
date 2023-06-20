<?php

$usersStatement = $mysqlClient->prepare('SELECT * FROM users');
$usersStatement->execute();
$users = $usersStatement->fetchAll();

$azokFetch = $mysqlClient->prepare('SELECT * FROM azok30');
$azokFetch->execute();
$azok30 = $azokFetch->fetchAll();

$rytrakFetch = $mysqlClient->prepare('SELECT * FROM rytrak');
$rytrakFetch->execute();
$rytrak= $rytrakFetch->fetchAll();

$w4nouFetch = $mysqlClient->prepare('SELECT * FROM w4nou');
$w4nouFetch->execute();
$w4nou = $w4nouFetch->fetchAll();

$itzdannio25Fetch = $mysqlClient->prepare('SELECT * FROM itzdannio25');
$itzdannio25Fetch->execute();
$itzdannio25 = $itzdannio25Fetch->fetchAll();

$alexcarsFetch = $mysqlClient->prepare('SELECT * FROM alexcars');
$alexcarsFetch->execute();
$alexcars = $alexcarsFetch->fetchAll();

$sgmFetch = $mysqlClient->prepare('SELECT * FROM sgm');
$sgmFetch->execute();
$sgm = $sgmFetch->fetchAll();

$otherFetch = $mysqlClient->prepare('SELECT * FROM other');
$otherFetch->execute();
$other = $otherFetch->fetchAll();

$zebraFetch = $mysqlClient->prepare('SELECT * FROM zebra');
$zebraFetch->execute();
$zebra = $zebraFetch->fetchAll();

$decalsFetch = $mysqlClient->prepare('SELECT * FROM decals');
$decalsFetch->execute();
$decals = $decalsFetch->fetchAll();

$zebra_cFetch = $mysqlClient->prepare('SELECT * FROM zebra_c');
$zebra_cFetch->execute();
$zebra_c = $zebra_cFetch->fetchAll();

$decals_cFetch = $mysqlClient->prepare('SELECT * FROM decals_c');
$decals_cFetch->execute();
$decals_c = $decals_cFetch->fetchAll();

// Si le cookie est présent
if (isset($_COOKIE['LOGGED_USER_EMAIL']) || isset($_SESSION['LOGGED_USER_EMAIL'])) {
    $loggedUser['email'] = $_COOKIE['LOGGED_USER_EMAIL'] ?? $_SESSION['LOGGED_USER_EMAIL'];
}

if (isset($_COOKIE['LOGGED_USER_PSEUDO']) || isset($_SESSION['LOGGED_USER_PSEUDO'])) {
    $loggedUser['pseudo'] = $_COOKIE['LOGGED_USER_PSEUDO'] ?? $_SESSION['LOGGED_USER_PSEUDO'];
}

$rootPath = $_SERVER['DOCUMENT_ROOT'];
$rootUrl = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
