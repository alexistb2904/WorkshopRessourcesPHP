<?php

    const MYSQL_HOST = echo($_ENV['MYSQL_HOST']);
    const MYSQL_USER = echo($_ENV['MYSQL_USERNAME']);
    const MYSQL_PASSWORD = echo($_ENV['MYSQL_PASSWORD']);
    const MYSQL_NAME = echo($_ENV['MYSQL_DATABASE']);
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

?>