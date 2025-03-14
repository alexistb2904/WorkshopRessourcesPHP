<?php
const BY_SERVER = true;
include_once '../../util/functions.php';
include_once '../../util/variables.php';
startSession();

$titleOfPage = 'SGM';
?>

<!DOCTYPE html>
<html lang="<?= $GLOBALS['lang'] ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Optimisez vos projets avec WorkshopRessource : découvrez nos decals sélectionner par la notre équipe et la communauté.">
    <meta name="keywords"
        content="workshop, ressources, gratuit, tutoriels, gmod, zébra, decals, template, créateur, jeu, garry's mod, <?php echo ($titleOfPage) ?>">
    <meta name="author" content="Alexis Thierry-Bellefond">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@alexistb2904">
    <meta name="twitter:title" content="WorkshopRessources - <?php echo ($titleOfPage) ?>">
    <meta name="twitter:description"
        content="Optimisez vos projets avec WorkshopRessource : découvrez nos decals sélectionner par la notre équipe et la communauté.">
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
    <title>WorkshopRessources -
        <?php echo ($titleOfPage) ?>
    </title>
</head>

<body>
    <header>
        <?php include_once '../../components/nav_bar.php' ?>
    </header>
    <main>
        <section class="header-text">
            <div>
                <h1>
                    <?php echo ($titleOfPage) ?>
                </h1>
                <p>Une liste des templates de
                    <?php echo ($titleOfPage) ?>
                </p>
            </div>
        </section>
        <?php if (isLogged() === false) { ?>
            <div class="banner-signup-container">
                <div class="banner-signup">
                    <p>Rejoins-nous pour pouvoir partager tes créations</p>
                    <a href="../../login.php?signup">
                        <button>S'inscrire</button>
                    </a>
                </div>
            </div>
        <?php } ?>
        <section class="download-container">
            <?php
            $titleOfPageLow = strtolower($titleOfPage);
            if (!isset($_GET['page'])) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            }
            $pageOffset = ($page - 1) * 12;
            $pageMax = count(getAllTable($titleOfPageLow)) / 12;
            foreach (getTable($titleOfPageLow, 12, $pageOffset, 0) as $item) { ?>
                <div class="download-card">
                    <div class="download-card-image">
                        <?php if (strpos($item['photo'], "http://") === 0 || strpos($item['photo'], "https://") === 0) { ?>
                            <img src="<?php echo ($item['photo']) ?>" alt="<?php echo $item['title']; ?>" loading="lazy">
                        <?php } else { ?>
                            <img src="../../<?php echo $item['photo']; ?>" alt="<?php echo $item['title']; ?>" loading="lazy">
                        <?php } ?>
                    </div>
                    <div class="download-card-text">
                        <a href="<?php echo ($item['url']) ?>">
                            <h2>
                                <?php echo $item['title']; ?>
                            </h2>
                        </a>
                    </div>
                    <?php if (strpos($item['photo'], "http://") === 0 || strpos($item['photo'], "https://") === 0) { ?>
                        <a class="download-card-button" href="<?php echo ($item['photo']) ?>" download>Télécharger</a>
                    <?php } else { ?>
                        <a class="download-card-button" href="../../<?php echo ($item['photo']) ?>" download>Télécharger</a>
                    <?php } ?>
                </div>
            <?php } ?>
        </section>
        <div class="page-index">
            <form method="get" action="">
                <?php if ($page > 1) { ?>
                    <input type="submit" name="page" value="<?php echo ($page - 1) ?>">
                <?php } ?>
                <p id="middle-page-index">
                    <?php echo ($page) ?>
                </p>
                <?php if ($page < $pageMax) { ?>
                    <input type="submit" name="page" value="<?php echo ($page + 1) ?>">
                <?php } ?>
            </form>
        </div>
    </main>
    <?php include_once '../../components/footer.php'; ?>
</body>

</html>