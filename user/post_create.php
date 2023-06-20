<?php
session_start();

include_once('../config/mysql.php');
include_once('../config/user.php');
include_once('../variables.php');
include_once ('../functions.php');

$postData = $_POST;

if (!isset($loggedUser)) {
    echo 'Vous devez être connecté pour accéder à cette page.';
    header("refresh:5;$rootUrl/login.php");
    exit();
}

if (!isset($postData['creator']) || !isset($postData['creator_name'])) {
    echo('Il faut remplir tous les champs pour pouvoir créer un véhicule.');
    return;
} elseif ( !isset($postData['title']) || !isset($postData['photo']) ) {

        echo('Il faut remplir tous les champs pour pouvoir créer un véhicule.');
        return;
    }

$title = htmlspecialchars($postData['title']);
if (!isset($postData['url'])){
    $url = '';
} else {
    $url = htmlspecialchars($postData['url']);
}
$photo = htmlspecialchars($postData['photo']);
if ($postData['creator'] == 'zebra_c_p'){
    $creator = 'zebra_c';
} elseif ($postData['creator'] == 'decals_c_p'){
    $creator = 'decals_c';
} else {
    echo('Catégorie de création inconnue.');
    return;
}
$creator_name = htmlspecialchars($postData['creator_name']);

$insertRecipe = $mysqlClient->prepare('INSERT INTO ' . $creator . '(title, url, photo, creator_name) VALUES (:title, :url, :photo, :creator_name)');
$insertRecipe->execute([
    'title' => $title,
    'url' => $url,
    'photo' => $photo,
    'creator_name' => $creator_name,
]);

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
            <p>Crée par <?php echo($creator_name); ?></p>
            <div class="grid-img">
                <img src="<?php echo($rootUrl). $photo; ?>"
                     alt="<?php echo($title); ?>" loading="lazy">

            </div>
            <?php if(!empty($url)) { ?>
            <a href="<?php echo($url); ?>">Lien</a>
            <?php } ?>
        </div>
    </form>
    <br/>
</main>
<?php include_once('../footer.php'); ?>
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

