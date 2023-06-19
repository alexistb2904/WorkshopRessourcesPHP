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

// Si le cookie est présent
if (isset($_COOKIE['LOGGED_USER']) || isset($_SESSION['LOGGED_USER'])) {
    $loggedUser = [
        'email' => $_COOKIE['LOGGED_USER'] ?? $_SESSION['LOGGED_USER'],
    ];
}

$rootPath = $_SERVER['DOCUMENT_ROOT'];
$rootUrl = 'https://' . $_SERVER['HTTP_HOST'] . '/';
