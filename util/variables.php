<?php
if ((substr($_SERVER['HTTP_HOST'], 0, strlen('localhost')) === 'localhost') || ($_SERVER['HTTP_HOST'] === "wslocal")) {
    $GLOBALS['rootUrl'] = 'http://' . $_SERVER['HTTP_HOST'] . '/';
} else {
    $GLOBALS['rootUrl'] = 'https://' . $_SERVER['HTTP_HOST'] . '/';
}

$GLOBALS['currentURL'] = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];



$userStatement = $GLOBALS['mysqlClientPDO']->prepare('SELECT * FROM users');
$userStatement->execute();
$GLOBALS['users'] = $userStatement->fetchAll();