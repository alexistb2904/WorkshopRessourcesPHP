<?php

const MYSQL_HOST = '54.37.204.19';
const MYSQL_PORT = 3306;
const MYSQL_NAME = 's79805_WorkshopRessources';
const MYSQL_USER = 'u79805_RH6t4MFKuh';
const MYSQL_PASSWORD = 'h2w+Lx5w.RPvqU+xB0YeiuTu';

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
