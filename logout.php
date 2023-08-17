<?php
include_once 'util/functions.php';
include_once 'util/variables.php';
startSession();
session_destroy();
const BY_SERVER = true;

unset($_SESSION['user_logged']);
unset($_SESSION['user_name']);
unset($loggedUser);
if (isLogged()) {
    header("Refresh:0");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
          content="Optimisez vos projets avec WorkshopRessource : découvrez nos outils exclusifs, incluant des décals et autres ressources, 100% Open-Source. Accédez à des tutoriels détaillés pour enrichir vos compétences. Élevez la qualité de vos projets grâce à des ressources exceptionnelles.">
    <meta name="keywords"
          content="workshop, ressources, gratuit, tutoriels, gmod, zébra, decals, template, créateur, jeu, garry's mod">
    <meta name="author" content="Alexis Thierry-Bellefond">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@alexistb2904">
    <meta name="twitter:title" content="WorkshopRessources - +100 Ressources pour vous">
    <meta name="twitter:description"
          content="Optimisez vos projets avec WorkshopRessource : découvrez nos outils exclusifs, incluant des décals et autres ressources, 100% Open-Source. Accédez à des tutoriels détaillés pour enrichir vos compétences. Élevez la qualité de vos projets grâce à des ressources exceptionnelles.">
    <meta name="twitter:image" content="<?php echo($GLOBALS['rootUrl']) ?>assets/images/logo.webp">
    <!-- Balise de Langue -->
    <meta http-equiv="Content-Language" content="fr">
    <!-- Balise de Favicon (Logo) -->
    <link rel="icon" href="<?php echo($GLOBALS['rootUrl']) ?>assets/images/favicon.ico" type="image/x-icon">
    <!-- Balise de CSS -->
    <link rel="stylesheet" href="<?php echo($GLOBALS['rootUrl']) ?>css/style.css">
    <script src="https://kit.fontawesome.com/e1413d4c65.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto&display=swap" rel="stylesheet">
    <title>WorkshopRessources - +100 Ressources pour vous</title>
</head>
<body>
<header>
    <?php include_once 'components/nav_bar.php' ?>
</header>
<main>
    <?php echo(isLogged())?>
    <?php if(isLogged() === false) {?>
        <div class="login-signup" style="display: flex; justify-content: center; align-items: center; margin: 0 15% 0 15%;">
            <h1 style="color: white; margin: 5% 0 5% 0; text-align: center;">Vous avez été déconnecté</h1>
            <a href="<?php echo($GLOBALS['rootUrl'])?>" style="background-color: #1F1F1F; padding: 2% 5% 2% 5%; color: white; text-decoration: none; border-radius: 1rem; margin-bottom: 5%;">Retourner à l'accueil</a>
        </div>
    <?php } else { ?>
        <div class="login-signup" style="display: flex; justify-content: center; align-items: center; margin: 0 15% 0 15%;">
            <h1 style="color: white; margin: 5% 0 5% 0; text-align: center;">Une erreur à eu lieu.</h1>
            <a href="<?php echo($GLOBALS['rootUrl'])?>" style="background-color: #1F1F1F; padding: 2% 5% 2% 5%; color: white; text-decoration: none; border-radius: 1rem; margin-bottom: 5%;">Retourner à l'accueil</a>
        </div>
    <?php } ?>
</main>
<?php include_once 'components/footer.php'; ?>
<script src="<?php echo($GLOBALS['rootUrl']) ?>js/login.js"></script>
</body>
</html>

