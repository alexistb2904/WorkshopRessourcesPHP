<?php
include_once('config/mysql.php');
include_once('variables.php');
include_once('functions.php');
?>

<?php

$postData = $_POST;

if (isset($postData['email']) &&  isset($postData['password'])) {
    foreach ($users as $user) {
        if (
            $user['email'] === $postData['email'] &&
            $user['password'] === $postData['password']
        ) {
            $loggedUser = [
                'email' => $user['email'],
            ];

            /**
             * Cookie qui expire dans un an
             */
            setcookie(
                'LOGGED_USER',
                $loggedUser['email'],
                [
                    'expires' => time() + 365*24*3600,
                    'secure' => true,
                    'httponly' => true,
                ]
            );

            $_SESSION['LOGGED_USER'] = $loggedUser['email'];
        } else {
            $errorMessage = sprintf('Les informations envoyées ne permettent pas de vous identifier : (%s/%s)',
                $postData['email'],
                $postData['password']
            );
        }
    }
}

// Si le cookie ou la session sont présentes
if (isset($_COOKIE['LOGGED_USER']) || isset($_SESSION['LOGGED_USER'])) {
    $loggedUser = [
        'email' => $_COOKIE['LOGGED_USER'] ?? $_SESSION['LOGGED_USER'],
    ];
}
?>

    <!doctype html>
    <html lang="fr">

<head>
    <title>AlexCars - WorkshopRessources</title>
    <!-- Required meta tags -->
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="../../assets/img/Logo/LogoWS.ico">
    <link rel="apple-touch-icon" sizes="114x114" href="../../assets/img/Logo/LogoWS.png" type="image/png" />
    <link rel="shortcut icon" href="../../assets/img/Logo/LogoWS.png" type="image/png" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="color-scheme" content="normal">
    <meta name="author" content="alexistb2904">
    <meta name="robots" content="index, follow">
    <meta http-equiv="content-language" content="fr-fr">
    <link rel="canonical" href="https://workshopressources.fr/template/creator/alexcars" />

    <!-- Base Meta Tags -->
    <meta name="title" content="AlexCars - WorkshopRessources">
    <meta name="description"
          content="Ici découvrez les templates des véhicules de AlexCars (alexistb2904) qui sont disponible sur WorkshopRessources.">
    <meta name="keywords"
          content="AlexCars,workshop,ressources,steam,download,template,gratuit,free,vehicle,véhicule,voiture,3D,police,secours,pompiers,png,jpeg,jpg,alexistb2904">

    <!-- Facebook Meta Tags -->
    <meta property="og:title" content="Templates de AlexCars" />
    <meta property="og:description"
          content="Ici découvrez les templates des véhicules de AlexCars (alexistb2904) qui sont disponible sur WorkshopRessources." />
    <meta property="og:image" content="https://workshopressources.fr/assets/img/Logo/LogoWS.png">
    <meta property="og:url" content="https://workshopressources.fr/template/creator/alexcars" />
    <meta property="og:locale" content="fr_FR" />
    <meta property="og:type" content="website">

    <!-- Twitter Meta Tags -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://workshopressources.fr/template/creator/alexcars">
    <meta property="twitter:title" content="Templates de AlexCars">
    <meta property="twitter:description"
          content="Ici découvrez les templates des véhicules de AlexCars (alexistb2904) qui sont disponible sur WorkshopRessources.">
    <meta property="twitter:image" content="https://workshopressources.fr/assets/img/Logo/LogoWS.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo&display=swap" rel="stylesheet">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-408NVZ99VY"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-408NVZ99VY');
    </script>
</head>

<div style="background-color: rgb(38,49,59);">

    <!-- Navigation -->
<?php include_once('header.php'); ?>

<?php if(!isset($loggedUser)): ?>
    <form action="" method="post">
        <div class="part-form" style="display: flex; align-items: center; flex-direction: column">
        <?php if(isset($errorMessage)) : ?>
            <div class="part-form" role="alert" style='display: flex; align-items: center; flex-direction: column; color: white;font-family: "Roboto", sans-serif;'>
                <?php echo($errorMessage); ?>
            </div>
        <?php endif; ?>
        <div class="part-form" style='display: flex; align-items: center; flex-direction: column; color: white;font-family: "Roboto", sans-serif;margin-top: 3vmax;margin-bottom: 1vmax;'>
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="email-help" placeholder="you@exemple.com">
        </div>
        <div class="part-form" style='display: flex; align-items: center; flex-direction: column; color: white;font-family: "Roboto", sans-serif;'>
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn-accueil" style="margin-bottom: 3vmax;">Envoyer</button>
    </form>
<?php else: ?>
    <div style='display: flex; align-items: center; flex-direction: column; color: white;font-family: "Roboto", sans-serif;' role="alert">
        <h1>Bonjour <?php echo($loggedUser['email']); ?> !</h1>
        <a class="grid-download-item-a" style="margin-bottom: 2vmax" href="home.php"><p>Accueil</p></a>
    </div>
<?php endif; ?>
</div>
</body>


    <?php include_once('footer.php'); ?>
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
