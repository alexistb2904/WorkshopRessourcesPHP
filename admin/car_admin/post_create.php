<?php
session_start();

include_once('../../config/mysql.php');
include_once('../../config/user.php');
include_once('../../variables.php');
include_once ('../../functions.php');

$postData = $_POST;
$rootUrl = $GLOBALS['rooturl'];

if (!is_admin($loggedUser['email'])) {
    echo 'Vous n\'avez pas les droits pour accéder à cette page.';
    header("refresh:5;$rootUrl/index.php");
    exit();
}

if (!isset($postData['creator'])) {
    echo('Il faut remplir tous les champs pour pouvoir créer un véhicule. ERROR1.');
    return;
} else {
    if ($postData['creator'] === 'zebra' || $postData['creator'] === 'decals') {
        if (!isset($postData['car_title']) || !isset($postData['car_photo'])) {
            echo('Il faut remplir tous les champs pour pouvoir créer un véhicule. ERROR2.');
            return;
        }
    } elseif($postData['creator'] === 'other'){
        if(!isset($postData['car_title']) || !isset($postData['car_url']) || !isset($postData['car_photo']) || !isset($postData['car_workshop'])){
            echo('Il faut remplir tous les champs pour pouvoir créer un véhicule. ERROR3.');
            return;
        }
    } elseif(!isset($postData['car_title']) || !isset($postData['car_url']) || !isset($postData['car_photo'])){
        echo('Il faut remplir tous les champs pour pouvoir créer un véhicule. ERROR4.');
        return;
    }
}

$title = $postData['car_title'];
if (!isset($postData['car_url'])){
    $url = '';
} else {
    $url = $postData['car_url'];
}
$photo = $postData['car_photo'];
$creator = $postData['creator'];
if (!isset($postData['car_workshop'])){
    $workshop_name = '';
} else {
    $workshop_name = $postData['car_workshop'];
}

if ($creator == 'other') {
    $insertRecipe = $mysqlClient->prepare('INSERT INTO ' . $creator . ' (title, url, photo, workshop_name, creator_name) VALUES (:title, :url, :photo, :workshop_name, :creator_name)');
    $insertRecipe->execute([
        'title' => $title,
        'url' => $url,
        'photo' => $photo,
        'workshop_name' => $workshop_name,
        'creator_name' => $loggedUser['username'],
    ]);
} else {
    $insertRecipe = $mysqlClient->prepare('INSERT INTO ' . $creator . '(car_title, car_url, car_photo) VALUES (:title, :url, :photo)');
    $insertRecipe->execute([
        'title' => $title,
        'url' => $url,
        'photo' => $photo,
    ]);
}
?>

<?php
$nameExtension = basename(__FILE__);
$name = pathinfo($nameExtension, PATHINFO_FILENAME);
$Cname = ucfirst($name);
$currentURL = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

$rootPath = $_SERVER['DOCUMENT_ROOT'];
$rootUrl = 'https://' . $_SERVER['HTTP_HOST'] . '/';

?>
<!doctype html>
<html lang="fr">
<head>
    <title><?php echo($Cname); ?> - WorkshopRessources</title>
    <!-- Required meta tags -->
    <link rel="stylesheet" href="<?php echo($rootUrl). 'style-admin.css'?>">
    <link rel="icon" href="<?php echo($rootUrl). 'assets/img/Logo/LogoWS.ico'?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo($rootUrl). 'assets/img/Logo/LogoWS.png'?>" type="image/png" />
    <link rel="shortcut icon" href="<?php echo($rootUrl). 'assets/img/Logo/LogoWS.png'?>" type="image/png" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="color-scheme" content="normal">
    <meta name="author" content="alexistb2904">
    <meta name="robots" content="index, follow">
    <meta http-equiv="content-language" content="fr-fr">
    <link rel="canonical" href="https://<?php echo($currentURL); ?>" />

    <!-- Base Meta Tags -->
    <meta name="title" content="<?php echo($Cname); ?> - WorkshopRessources">
    <meta name="description"
          content="Panel Administrateur">
    <meta name="keywords"
          content="<?php echo($Cname); ?>,workshop,ressources,steam,download,template,gratuit,free,vehicle,véhicule,voiture,3D,police,secours,pompiers,png,jpeg,jpg,alexistb2904">


    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-408NVZ99VY"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-408NVZ99VY');
    </script>

    <script type="text/javascript">
        (function (c, l, a, r, i, t, y) {
            c[a] = c[a] || function () { (c[a].q = c[a].q || []).push(arguments) };
            t = l.createElement(r); t.async = 1; t.src = "https://www.clarity.ms/tag/" + i;
            y = l.getElementsByTagName(r)[0]; y.parentNode.insertBefore(t, y);
        })(window, document, "clarity", "script", "g3iiq9rlyc");
    </script>

</head>

<body>

<!-- Main -->
<main>
    <?php include_once($rootPath.'/header.php'); ?>

    <form action="" method="POST">
        <div style="display: flex; align-items: center; flex-direction: column">
            <h1><?php echo($title); ?> à été crée</h1>
            <p>Catégorie : <?php echo($creator); ?></p>
            <div class="grid-img">
                <?php if(strpos($photo, "http://") === 0 || strpos($photo, "https://") === 0) { ?>
                    <img src="<?php echo($photo) ?>"
                         alt="<?php echo ($title) ?>" loading="lazy">
                <?php } else { ?>
                    <img src="../../<?php echo($photo) ?>"
                         alt="<?php echo ($title) ?>" loading="lazy">
                <?php } ?>

            </div>
            <?php if($creator == 'zebra' || $creator == 'decals' ) { ?>
            <?php } else { ?>
            <a href="<?php echo($url); ?>">Lien Workshop</a>
            <?php } ?>
        </div>
    </form>
    <br/>
</main>
<?php include_once('../../footer.php'); ?>
</body>
</html>

