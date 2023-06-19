<?php

// Si le cookie est présent
if (isset($_COOKIE['LOGGED_USER_EMAIL']) || isset($_SESSION['LOGGED_USER_EMAIL'])) {
    $loggedUser['email'] = $_COOKIE['LOGGED_USER_EMAIL'] ?? $_SESSION['LOGGED_USER_EMAIL'];
}

if (isset($_COOKIE['LOGGED_USER_PSEUDO']) || isset($_SESSION['LOGGED_USER_PSEUDO'])) {
    $loggedUser['pseudo'] = $_COOKIE['LOGGED_USER_PSEUDO'] ?? $_SESSION['LOGGED_USER_PSEUDO'];
}