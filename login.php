<?php session_start();
include_once('config/mysql.php');
include_once('variables.php');
include_once('functions.php');

$postData = $_POST;

if (htmlspecialchars(isset($postData['login'])) &&  htmlspecialchars(isset($postData['password']))) {
    $passhash = htmlspecialchars(password_hash($postData['password'], PASSWORD_DEFAULT));
    foreach ($users as $user) {
        if (
            htmlspecialchars($user['email']) || htmlspecialchars($user['username']) === htmlspecialchars($postData['login']) && password_verify(htmlspecialchars($user['password']), $passhash)
        ) {
            $loggedUser = [
                'email' => htmlspecialchars($user['email']),
                'pseudo' => htmlspecialchars($user['username'])
            ];

            /**
             * Cookie qui expire dans un an
             */
            setcookie(
                'LOGGED_USER_EMAIL',
                $loggedUser['email'],
                [
                    'expires' => time() + 1*24*3600,
                    'secure' => true,
                    'httponly' => true,
                ]
            );
            setcookie(
                'LOGGED_USER_PSEUDO',
                $loggedUser['pseudo'],
                [
                    'expires' => time() + 1*24*3600,
                    'secure' => true,
                    'httponly' => true,
                ]
            );

            $_SESSION['LOGGED_USER_EMAIL'] = $loggedUser['email'];
            $_SESSION['LOGGED_USER_PSEUDO'] = $loggedUser['pseudo'];
        } else {
            $errorMessage = "L'email ou le mot de passe est incorrect.";
        }
    }
}

// Si le cookie ou la session sont présentes
if (isset($_COOKIE['LOGGED_USER_EMAIL']) || isset($_SESSION['LOGGED_USER_EMAIL'])) {
    $loggedUser['email'] = $_COOKIE['LOGGED_USER_EMAIL'] ?? $_SESSION['LOGGED_USER_EMAIL'];
}

if (isset($_COOKIE['LOGGED_USER_PSEUDO']) || isset($_SESSION['LOGGED_USER_PSEUDO'])) {
    $loggedUser['pseudo'] = $_COOKIE['LOGGED_USER_PSEUDO'] ?? $_SESSION['LOGGED_USER_PSEUDO'];
}
?>

    <!doctype html>
    <html lang="fr">

<head>
    <title>Connection - WorkshopRessources</title>
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
    <meta name="title" content="Connection - WorkshopRessources">
    <meta name="description"
          content="Page de connection workshopressources">
    <meta name="keywords"
          content="AlexCars,workshop,ressources,steam,download,template,gratuit,free,vehicle,véhicule,voiture,3D,police,secours,pompiers,png,jpeg,jpg,alexistb2904">

    <!-- Facebook Meta Tags -->
    <meta property="og:title" content="Connection - WorkshopRessources" />
    <meta property="og:description"
          content="Page de connection workshopressources" />
    <meta property="og:image" content="https://workshopressources.fr/assets/img/Logo/LogoWS.png">
    <meta property="og:url" content="https://workshopressources.fr/template/creator/alexcars" />
    <meta property="og:locale" content="fr_FR" />
    <meta property="og:type" content="website">

    <!-- Twitter Meta Tags -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://workshopressources.fr/template/creator/alexcars">
    <meta property="twitter:title" content="Connection - WorkshopRessources">
    <meta property="twitter:description"
          content="Page de connection workshopressources">
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
<body>
<div style="background-color: rgb(38,49,59);">

    <!-- Navigation -->
<?php include_once('header.php'); ?>

<?php if(!isset($loggedUser)): ?>
    <div style="display: flex; align-items: center; justify-content: space-evenly;">
        <div>
            <form action="" method="post">
                <div class="part-form" style="display: flex; align-items: center; flex-direction: column">
                    <p style="margin-top: 1vh;">Se connecter</p>
                    <div class="part-form" style="display: flex; align-items: center; flex-direction: column">
                    <?php if(isset($errorMessage)) : ?>
                        <div class="part-form" role="alert" style='display: flex; align-items: center; flex-direction: column; color: white;font-family: "Roboto", sans-serif;'>
                            <?php echo($errorMessage); ?>
                        </div>
                    <?php endif; ?>
                    <div class="part-form" style='display: flex; align-items: center; flex-direction: column; color: white;font-family: "Roboto", sans-serif;margin-top: 3vmax;margin-bottom: 1vmax;'>
                        <label for="login" class="form-label">Email ou Pseudo</label>
                        <input type="text" class="form-control" id="login" name="login" aria-describedby="email-help" placeholder="you@exemple.com">
                    </div>
                    <div class="part-form" style='display: flex; align-items: center; flex-direction: column; color: white;font-family: "Roboto", sans-serif;'>
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn-accueil" style="margin-bottom: 3vmax;">Se connecter</button>
                    </div>
                </div>
            </form>
        </div>
        <div>
            <form action="createaccount.php" method="post">
                <div class="part-form" style="display: flex; align-items: center; flex-direction: column">
                    <p style="margin-top: 1vh;">Crée un compte</p>
                    <div class="part-form" style='display: flex; align-items: center; flex-direction: column; color: white;font-family: "Roboto", sans-serif;margin-top: 3vmax;margin-bottom: 1vmax;'>
                        <label for="username" class="form-label">Pseudo</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Ton pseudo ( 64 max )">
                    </div>
                    <div class="part-form" style='display: flex; align-items: center; flex-direction: column; color: white;font-family: "Roboto", sans-serif;margin-bottom: 1vmax;'>
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="email-help" placeholder="you@exemple.com">
                    </div>
                    <div class="part-form" style='display: flex; align-items: center; flex-direction: column; color: white;font-family: "Roboto", sans-serif;'>
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn-accueil" style="margin-bottom: 3vmax;">S'enregistrer</button>
                </div>
            </form>
        </div>
    </div>
<?php else: ?>
    <div style='display: flex; align-items: center; flex-direction: column; color: white;font-family: "Roboto", sans-serif;' role="alert">
        <h1>Bonjour <?php echo($loggedUser['email']); ?></h1>
        <a class="grid-download-item-a" style="margin-bottom: 2vmax" href="index.php"><p>Accueil</p></a>
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