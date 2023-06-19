<?php

    $mysqlHost = $_ENV['MYSQL_HOST'];
    $mysqlUser = $_ENV['MYSQL_USERNAME'];
    $mysqlPassword = $_ENV['MYSQL_PASSWORD'];
    $mysqlName = $_ENV['MYSQL_DATABASE'];
    $mysqlPort = 3306;
    
try {
    $mysqlClient = new PDO(
        sprintf('mysql:host=%s;dbname=%s;port=%s', $mysqlHost, $mysqlName, $mysqlPort),
        $mysqlUser,
        $mysqlPassword
    );
    $mysqlClient->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(Exception $exception) {
    die('Erreur : '.$exception->getMessage());
}
?>

