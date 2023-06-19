<?php

    const MYSQL_HOST = $_SERVER['MYSQL_HOST'];
    const MYSQL_USER = $_SERVER['MYSQL_USERNAME'];
    const MYSQL_PASSWORD = $_SERVER['MYSQL_PASSWORD'];
    const MYSQL_NAME = $_SERVER['MYSQL_DATABASE'];
    const MYSQL_PORT = 3306;

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
