<?php session_start();
    include_once('../../config/mysql.php');
    include_once('../../config/user.php');
    include_once('../../variables.php');
    include_once ('../../functions.php');

if (!is_admin($loggedUser['email'])) {
    echo 'Vous n\'avez pas les droits pour accéder à cette page.';
    header("refresh:5;$rootUrl/index.php");
    exit();
}

$getData = $_GET;
?>

<?php
$nameExtension = basename(__FILE__);
$name = pathinfo($nameExtension, PATHINFO_FILENAME);
$Cname = ucfirst($name);
$currentURL = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

$rootPath = $_SERVER['DOCUMENT_ROOT'];
$rootUrl = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';

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
        <form action="<?php echo($rootUrl . 'admin/car_admin/post_update.php'); ?>" method="POST">
            <h1>Mettre à jour <?php echo($getData['car_title']); ?></h1>
            <div class="part-form">
                <label for="id" class="form-label">ID du contenu</label>
                <input type="text" class="form-control" id="id" name="id" value="<?php echo($getData['id']); ?> " disabled>
                <input type="hidden" class="form-control" id="creator" name="creator" value="<?php echo($getData['creator']); ?>">
            </div>
            <div class="part-form">
                <label for="id" class="form-label">Créateur du contenu</label>
                <input type="text" class="form-control" id="creator" name="creator" value="<?php echo($getData['creator']); ?> " disabled>
            </div>
            <div class="part-form">
                <label for="car_title" class="form-label">Titre du contenu</label>
                <input type="text" class="form-control" id="car_title" name="car_title" aria-describedby="title-help" value="<?php echo($getData['car_title']); ?>" placeholder="<?php echo($getData['car_title']); ?>" autocomplete="off">
            </div>
            <div class="part-form">
                <label for="car_url" class="form-label">Url du workshop</label>
                <input type="text" class="form-control" placeholder="URL Workshop du contenu" id="car_url" name="car_url" value="<?php echo strip_tags($getData['car_url']); ?>" autocomplete="off">
            </div>
            <div class="part-form">
                <label for="car_photo" class="form-label">Template du contenu</label>
                <input type="text" class="form-control" placeholder="URL de l'image" id="car_photo" name="car_photo" value="<?php echo strip_tags($getData['car_photo']); ?>" autocomplete="off">
            </div>
            <?php if(isset($getData['is_enabled'])) { ?>
                <div class="part-form">
                    <label for="is_enabled" class="form-label">Activation</label>
                    <input type="number" class="form-control" placeholder="Base : <?php echo strip_tags($getData['is_enabled']); ?>" id="is_enabled" name="is_enabled" value="<?php echo strip_tags($getData['is_enabled']); ?>" min="0" max="1" autocomplete="off">
                </div>
            <?php } ?>
            <button type="submit" class="btn-up">Envoyer</button>
        </form>
        <br />
</main>
    <?php include_once($rootPath.'/footer.php'); ?>
</body>
</html>