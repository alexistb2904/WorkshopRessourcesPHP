<?php
session_start();

include_once('../config/mysql.php');
include_once('../config/user.php');
include_once('../variables.php');
include_once ('../functions.php');

if (!isset($loggedUser['email'])) {
    echo 'Vous n\'avez pas les droits pour accéder à cette page.';
    header("refresh:5;$rootUrl/index.php");
    exit();
}

$postData = $_POST;

if (!isset($postData['id']) || !isset($postData['creator']))
{
    echo('Pour supprimer ce véhicule, vous devez passer par le formulaire avec un ID valide et un créateur valide.');
    return;
}

$id = $postData['id'];
if ($postData['creator'] == 'zebra_c_p') {
    $creator = 'zebra_c';
} elseif ($postData['creator'] == 'decals_c_p') {
    $creator = 'decals_c';
} else {
    echo 'Il faut remplir tous les champs pour pouvoir editer un véhicule ERROR4.';
    return;
}


$stmt = $mysqlClient->prepare('SELECT COUNT(*) FROM '. $creator .' WHERE creator_name = :creator_name AND id = :id');
$stmt->execute([
    'creator_name' => $loggedUser['pseudo'],
    'id' => $id,
]);
$count = $stmt->fetchColumn();

if ((int)$count == 0) {
    echo 'Ce n\'est pas possible de modifier un fichier que vous n\'avez pas crée.';
    header("refresh:5;$rootUrl/index.php");
    return;
} else {
    $deleteRecipeStatement = $mysqlClient->prepare('DELETE FROM ' . $creator . ' WHERE id = :id');
    $deleteRecipeStatement->execute([
        'id' => $id,
    ]);
}


header('Location: '.$rootUrl.'home.php');
?>
