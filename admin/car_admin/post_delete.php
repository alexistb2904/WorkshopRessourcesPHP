<?php
session_start();

include_once('../../config/mysql.php');
include_once('../../config/user.php');
include_once('../../variables.php');
include_once ('../../functions.php');

if (!is_admin($loggedUser['email'])) {
    echo 'Vous n\'avez pas les droits pour accéder à cette page.';
    header("refresh:5;$rootUrl/home.php");
    exit();
}

$postData = $_POST;

if (!isset($postData['id']) || !isset($postData['creator']))
{
    echo('Pour supprimer ce véhicule, vous devez passer par le formulaire de modification avec un ID valide et le créateur du véhicule.');
    return;
}

$id = $postData['id'];
$creator = $postData['creator'];

$deleteRecipeStatement = $mysqlClient->prepare('DELETE FROM ' . $creator . ' WHERE car_id = :id');
$deleteRecipeStatement->execute([
    'id' => $id,
]);


header('Location: '.$rootUrl.'home.php');
?>
