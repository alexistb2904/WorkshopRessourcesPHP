<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

    $mysqlHost = $_ENV['MYSQL_HOST'];
    $mysqlUser = $_ENV['MYSQL_USERNAME'];
    $mysqlPassword = $_ENV['MYSQL_PASSWORD'];
    $mysqlName = $_ENV['MYSQL_DATABASE'];
    $mysqlPort = 3306;

    const MYSQL_HOST = $mysqlHost;
    const MYSQL_USER = $mysqlUser;
    const MYSQL_PASSWORD = $mysqlPassword;
    const MYSQL_NAME = $mysqlName;
    const MYSQL_PORT = $mysqlPort;

try {
    $mysqlClient = new PDO(
        sprintf('mysql:host=%s;dbname=%s;port=%s', MYSQL_HOST, MYSQL_NAME, MYSQL_PORT),
        MYSQL_USER,
        MYSQL_PASSWORD
    );
    $mysqlClient->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(Exception $exception) {
    die('Erreur : '.$exception->getMessage());
}
?>
