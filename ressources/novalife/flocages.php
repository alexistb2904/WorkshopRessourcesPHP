<?php
const BY_SERVER = true;
include_once '../../util/functions.php';
include_once '../../util/variables.php';
startSession();

$titleOfPage = 'Nova-Life Flocages';
?>

<!DOCTYPE html>
<html lang="<?= $GLOBALS['lang'] ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Découvrez nos flocages de véhicules pour Nova-Life donnez une touche unique à vos véhicules.">
    <meta name="keywords"
        content="workshop, ressources, gratuit, tutoriels, zébra, decals, template, créateur, jeu, <?php echo ($titleOfPage) ?>">
    <meta name="author" content="Alexis Thierry-Bellefond">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@alexistb2904">
    <meta name="twitter:title" content="WorkshopRessources - <?php echo ($titleOfPage) ?>">
    <meta name="twitter:description"
        content="Découvrez nos flocages de véhicules pour Nova-Life donnez une touche unique à vos véhicules.">
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
    <title>
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
                <p>Une liste de flocage pour Nova-Life
                </p>
            </div>
            <a class="glow-button-a" href="templates.php">
                <button class="glow-button">DÉCOUVRE LES TEMPLATES</button>
            </a>
        </section>
        <?php if (isLogged() === false) { ?>
            <div class="banner-signup-container">
                <div class="banner-signup">
                    <p>Rejoins-nous pour pouvoir partager tes créations</p>
                    <a href="<?php echo ($GLOBALS['rootUrl']) ?>login.php?signup">
                        <button>S'inscrire</button>
                    </a>
                </div>
            </div>
        <?php } ?>
        <section class="download-container">
            <?php
            $titleOfPageLow = strtolower('novalife_flocage');
            if (!isset($_GET['page'])) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            }
            $pageOffset = ($page - 1) * 12;
            $pageMax = count(getAllTable($titleOfPageLow)) / 12;
            foreach (getTable($titleOfPageLow, 12, $pageOffset, 1) as $item) { ?>
                <div class="download-card">
                    <div class="download-card-image">
                        <?php if (strpos($item['photo'], "http://") === 0 || strpos($item['photo'], "https://") === 0) {
                            $lienPhoto = $item['photo'] ?>
                        <?php } else {
                            $lienPhoto = '../' . $item['photo'] ?>
                        <?php } ?>
                        <img src="<?php echo $lienPhoto; ?>" alt="<?php echo $item['title']; ?>" loading="lazy">
                    </div>
                    <div class="download-card-text">
                        <a href="<?php echo $lienPhoto ?>" target="_blank">
                            <h2>
                                <?php echo $item['title']; ?>
                            </h2>
                        </a>
                        <p>Ajouté par:
                            <?php echo $item['creator_name']; ?>
                        </p>
                    </div>
                    <?php if (strpos($item['photo'], "http://") === 0 || strpos($item['photo'], "https://") === 0) { ?>
                        <a class="download-card-button" href="<?php echo ($item['photo']) ?>" target="_blank"
                            download>Télécharger</a>
                    <?php } else { ?>
                        <a class="download-card-button" href="../../<?php echo ($item['photo']) ?>" download>Télécharger</a>
                    <?php } ?>
                    <?php if (strpos($item['photo'], "http://") === 0 || strpos($item['photo'], "https://") === 0) { ?>
                        <a class="download-card-button" onclick="clipboard('<?php echo ($item['photo']) ?>')"
                            title="Copier le lien direct vers l'image" style="cursor: pointer; user-select: none;">Copier
                            Lien</a>
                    <?php } ?>
                </div>
            <?php } ?>
            <?php if (isLogged() == true) { ?>
                <a class="button-empty"
                    href="<?php echo ($GLOBALS['rootUrl']) ?>panel/add.php?<?php echo $titleOfPageLow ?>">Créer une nouvelle
                    ressource</a>
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
    <script src="<?php echo ($GLOBALS['rootUrl']) ?>js/clipboard.js"></script>
</body>

</html>