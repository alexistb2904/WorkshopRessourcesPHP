<?php
session_start();

include_once('../../config/mysql.php');
include_once('../../config/user.php');
include_once('../../variables.php');
include_once ('../../functions.php');

if (!is_admin($loggedUser['email'])) {
    echo 'Vous n\'avez pas les droits pour accéder à cette page.';
    header("refresh:5;$rootUrl/index.php");
    exit();
}

$postData = $_POST;

if (!isset($postData['creator'])) {
    echo('Il faut remplir tous les champs pour pouvoir créer un véhicule ERROR1.' . $postData['creator'] . ' ');
    return;
} else {
    if ($postData['creator'] === 'zebra' || $postData['creator'] === 'decals') {
        if (!isset($postData['car_title']) || !isset($postData['car_photo']) || !isset($postData['id']) || !isset($postData['is_enabled'])) {
            echo('Il faut remplir tous les champs pour pouvoir créer un véhicule'. $postData['id'] . ' ERROR2.');
            return;
        }
    } elseif ( !isset($postData['car_title']) || !isset($postData['car_url']) || !isset($postData['car_photo']) || !isset($postData['id']) )
    {
        echo('Il faut remplir tous les champs pour pouvoir créer un véhicule ERROR3.');
        return;
    }
}

$id = $postData['id'];
$title = $postData['car_title'];
$photo = $postData['car_photo'];
if (!isset($postData['car_url'])){
    $url = '';
} else {
    $url = $postData['car_url'];
}
if (isset($postData['is_enabled'])){
    $is_enabled = $postData['is_enabled'];
}
$creator = $postData['creator'];

if (!isset($postData['is_enabled'])) {
    $insertRecipeStatement = $mysqlClient->prepare('UPDATE ' . $creator . ' SET car_title = :title, car_url = :url, car_photo = :photo WHERE car_id = :id');
    $insertRecipeStatement->execute([
        'title' => $title,
        'photo' => $photo,
        'url' => $url,
        'id' => $id,
    ]);
} else {
    $insertRecipeStatement = $mysqlClient->prepare('UPDATE ' . $creator . ' SET car_title = :title, car_url = :url, car_photo = :photo, is_enabled = :is_enabled WHERE car_id = :id');
    $insertRecipeStatement->execute([
        'title' => $title,
        'photo' => $photo,
        'url' => $url,
        'is_enabled' => $is_enabled,
        'id' => $id,
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
            <h1><?php echo($title); ?> à été mis à jour</h1>
            <p>Catégorie : <?php echo($creator); ?></p>
            <div class="grid-img">
                <img src="../../<?php echo($photo); ?>"
                     alt="<?php echo($title); ?>" loading="lazy">

            </div>
            <?php if($creator == 'zebra' || $creator == 'decals' ) { ?>
                <p>Status <?php echo($is_enabled); ?></p>
            <?php } else { ?>
                <a href="<?php echo($url); ?>">Lien Workshop</a>
            <?php } ?>
        </div>
    </form>
    <br/>
</main>
<?php include_once('../../footer.php'); ?>
<script>
    var dropdown = document.getElementsByClassName("btn-dropdown-ws");
    var i;

    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function () {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    }
</script>
</body>
</html>
