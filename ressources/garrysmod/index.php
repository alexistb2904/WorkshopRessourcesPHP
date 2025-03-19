<?php
const BY_SERVER = true;
include_once '../../util/functions.php';
include_once '../../util/variables.php';
?>

<!DOCTYPE html>
<html lang="<?= $GLOBALS['lang'] ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Optimisez vos projets avec WorkshopRessource : découvrez nos templates sur Garry's Mod, 100% Open-Source. Élevez la qualité de vos projets grâce à des ressources exceptionnelles.">
    <meta name="keywords"
        content="workshop, ressources, gratuit, tutoriels, gmod, zébra, decals, template, créateur, jeu, garry's mod, novalife, nova-life">
    <meta name="author" content="Alexis Thierry-Bellefond">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@alexistb2904">
    <meta name="twitter:title" content="WorkshopRessources - +100 Ressources pour vous">
    <meta name="twitter:description"
        content="Optimisez vos projets avec WorkshopRessource : découvrez nos templates sur Garry's Mod, 100% Open-Source. Élevez la qualité de vos projets grâce à des ressources exceptionnelles.">
    <meta name="twitter:image" content="<?php echo ($GLOBALS['rootUrl']) ?>assets/images/logo.webp">
    <!-- Balise de Langue -->
    <meta http-equiv="Content-Language" content="fr">
    <!-- Balise de Favicon (Logo) -->
    <link rel="icon" href="<?php echo ($GLOBALS['rootUrl']) ?>assets/images/favicon.ico" type="image/x-icon">
    <!-- Balise de CSS -->
    <link rel="stylesheet" href="<?php echo ($GLOBALS['rootUrl']) ?>css/style.css">
    <script src="https://kit.fontawesome.com/e1413d4c65.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto&display=swap" rel="stylesheet">
    <title>WorkshopRessources - Garry's Mod</title>
</head>

<body>
    <header>
        <?php include_once '../../components/nav_bar.php' ?>
    </header>
    <main>
        <h2 class="game-title">Garry's Mod</h2>
        <?php if (isLogged() === false) { ?>
            <div class="banner-signup-container">
                <div class="banner-signup">
                    <p>Rejoins-nous pour pouvoir partager tes créations</p>
                    <a href="../../login.php?signup">
                        <button>S'inscrire</button>
                    </a>
                </div>
            </div>
        <?php } else { ?>
            <div class="banner-signup-container">
                <div class="banner-signup">
                    <p>Commence à partager tes créations</p>
                    <a href="../../panel/index.php">
                        <button>Panel Utilisateur</button>
                    </a>
                </div>
            </div>
        <?php } ?>
        <section class="header-text">
            <div>
                <h2>Ressources</h2>
                <p>Une liste de ressources utiles pour vous</p>
            </div>
        </section>
        <section class="start-card" id="start-ressources">
            <a href="tutoriels.php" class="start-a">
                <div class="start" id="tutoriels">
                    <div class="start-item">
                        <h3>Tutoriels</h3>
                    </div>
                </div>
            </a>
            <a href="vmtvtf.php" class="start-a">
                <div class="start" id="vmtvtf">
                    <div class="start-item">
                        <h3>VMT/VTF</h3>
                    </div>
                </div>
            </a>
            <a href="outils.php" class="start-a">
                <div class="start" id="outils">
                    <div class="start-item">
                        <h3>Outils</h3>
                    </div>
                </div>
            </a>
        </section>
        <section class="header-text">
            <div>
                <h2>Templates</h2>
                <p>Une liste de templates présélectionner juste pour vous</p>
            </div>
        </section>
        <section class="start-card" id="start-ressources">
            <a href="alexcars.php" class="start-a">
                <div class="start" id="alexcars">
                    <div class="start-item">
                        <h3>AlexCars</h3>
                    </div>
                </div>
            </a>
            <a href="rytrak.php" class="start-a">
                <div class="start" id="rytrak">
                    <div class="start-item">
                        <h3>Rytrak</h3>
                    </div>
                </div>
            </a>
            <a href="w4nou.php" class="start-a">
                <div class="start" id="w4nou">
                    <div class="start-item">
                        <h3>W4nou</h3>
                    </div>
                </div>
            </a>
            <a href="itzdannio25.php" class="start-a">
                <div class="start" id="itzdannio25">
                    <div class="start-item">
                        <h3>ItzDannio25</h3>
                    </div>
                </div>
            </a>
            <a href="azok30.php" class="start-a">
                <div class="start" id="azok30">
                    <div class="start-item">
                        <h3>Azok30</h3>
                    </div>
                </div>
            </a>
            <a href="sgm.php" class="start-a">
                <div class="start" id="sgm">
                    <div class="start-item">
                        <h3>SGM</h3>
                    </div>
                </div>
            </a>
            <a href="tdmcars.php" class="start-a">
                <div class="start" id="tdmcars">
                    <div class="start-item">
                        <h3>TDMCars</h3>
                    </div>
                </div>
            </a>
            <a href="lwcars.php" class="start-a">
                <div class="start" id="lwcars">
                    <div class="start-item">
                        <h3>LWCars</h3>
                    </div>
                </div>
            </a>
            <a href="other.php" class="start-a">
                <div class="start-item" style="justify-content: center;">
                    <h3>Template de la communauté</h3>
                </div>
            </a>
        </section>
    </main>
    <?php include_once '../../components/footer.php'; ?>
</body>

</html>