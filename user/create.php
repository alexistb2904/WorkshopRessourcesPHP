<?php session_start();
    include_once('../config/mysql.php');
    include_once('../config/user.php');
    include_once('../variables.php');
    include_once('../functions.php');

    $getData = $_GET;

if (!isset($loggedUser)) {
    echo 'Vous devez être connecté pour accéder à cette page.';
    header("refresh:5;$rootUrl/login.php");
    exit();
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
    <title><?php echo($Cname); ?> - Création</title>
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
    <meta name="title" content="<?php echo($Cname); ?> - Création">
    <meta name="description"
          content="Panel Création">
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
    <div style="display: flex; flex-direction: column">

    <?php include_once($rootPath.'/header.php'); ?>
        <form action="<?php echo($rootUrl . 'user/post_create.php'); ?>" method="POST">
            <h1>Création de contenu</h1>
            <div class="part-form">
                <input type="hidden" class="form-control" id="creator" name="creator" value="<?php echo($getData['creator']); ?>">
                <input type="hidden" class="form-control" id="creator_name" name="creator_name" value="<?php echo($getData['creator_name']); ?>">
                <label for="title" class="form-label">Titre du contenu</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="title-help" placeholder="Titre du contenu" autocomplete="off">
            </div>
            <div class="part-form">
                <label for="url" class="form-label">Url du contenu</label>
                <input type="text" class="form-control" placeholder="URL du contenu | Sauf zébra & decals" id="url" name="url" autocomplete="off">
            </div>
            <div class="part-form">
                <label for="photo" class="form-label">Image du contenu</label>
                <input type="text" class="form-control" placeholder="URL de l'image" id="photo" name="photo" autocomplete="off">
            <button type="submit" class="btn-up">Envoyer</button>
        </form>
        <br />
    </div>

    <?php include_once($rootPath.'/footer.php'); ?>
</body>
</html>