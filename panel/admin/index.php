<?php
const BY_SERVER = true;
include_once '../../util/functions.php';
include_once '../../util/variables.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);
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
    <?php include_once '../../components/nav_bar.php' ?>
</header>
    <main>
        <?php if(!isLogged() || !isAdmin($_SESSION['email'])) { ?>
            <section class="header-text">
                <div>
                    <h1>Oups..</h1>
                    <p>Tu dois être connecté et avoir la permission pour accéder à cette page</p>
                </div>
                <a class="glow-button-a" href="<?php echo($GLOBALS['rootUrl'])?>login.php">
                    <button class="glow-button">ME CONNECTER</button>
                </a>
            </section>
        <?php } else { ?>
            <section class="header-text">
                <div>
                    <h1>Bienvenue <?php echo($_SESSION['username']) ?></h1>
                    <p>Tu es sur ton panel admin qui va te permettre de gérer les ressources</p>
                    <p><a href="../index.php">Panel Utilisateur</a></p>
                </div>
            </section>
            <section class="category-container">
                <div class="category-div">
                    <a class="button-category" id="zebra-b" onclick="showZebra('admin')">Zebra</a>
                    <a class="button-category" id="decals-b" onclick="showDecals('admin')">Decals</a>
                    <a class="button-category" id="template-b" onclick="showTemplate('admin')">Templates</a>
                    <a class="button-category" id="community-b" onclick="showCommunity('admin')">Vérifications</a>

                </div>
                <div class="category-card-container">
                    <div id="zebra-b-div">
                        <?php if (!empty(getAllTable('zebra'))) { ?>
                            <?php foreach (getAllTable('zebra') as $item ) { ?>
                                <div class="download-card">
                                    <div class="download-card-image">
                                        <?php if(strpos($item['photo'], "http://") === 0 || strpos($item['photo'], "https://") === 0) { ?>
                                            <img src="<?php echo($item['photo']) ?>"
                                                 alt="<?php echo $item['title']; ?>" loading="lazy">
                                        <?php } else { ?>
                                            <img src="../../<?php echo $item['photo']; ?>"
                                                 alt="<?php echo $item['title']; ?>" loading="lazy">
                                        <?php } ?>
                                    </div>
                                    <div class="download-card-text">
                                        <a href="<?php echo($item['url']) ?>">
                                            <h2><?php echo $item['title']; ?></h2>
                                        </a>
                                    </div>
                                    <div style="display: flex; flex-direction: column; width: 100%; align-items: center; justify-content: center;">
                                        <a class="download-card-button" id="edit-b" href="edit.php?id=<?php echo($item['id']) ?>&category=zebra">Modifier</a>
                                        <a class="download-card-button" id="delete-b" href="delete.php?id=<?php echo($item['id']) ?>&category=zebra">Supprimer</a>
                                    </div>
                                </div>
                            <?php } ?>
                            <a class="button-empty" href="add.php?zebra">Créer une nouvelle ressource</a>
                        <?php } else { ?>
                            <div style="grid-column-start: 1; grid-column-end: 5; display: flex; flex-direction: column; justify-content: center; align-items: center">
                                <p class="text-empty">Aucune ressource :(</p>
                                <a class="button-empty" href="add.php?zebra">Commence Maintenant</a>
                            </div>
                        <?php } ?>
                    </div>
                    <div id="decals-b-div">
                        <?php if (!empty(getAllTable('decals'))) { ?>
                            <?php foreach (getAllTable('decals') as $item ) { ?>
                                <div class="download-card">
                                    <div class="download-card-image">
                                        <?php if(strpos($item['photo'], "http://") === 0 || strpos($item['photo'], "https://") === 0) { ?>
                                            <img src="<?php echo($item['photo']) ?>"
                                                 alt="<?php echo $item['title']; ?>" loading="lazy">
                                        <?php } else { ?>
                                            <img src="../../<?php echo $item['photo']; ?>"
                                                 alt="<?php echo $item['title']; ?>" loading="lazy">
                                        <?php } ?>
                                    </div>
                                    <div class="download-card-text">
                                        <a href="<?php echo($item['url']) ?>">
                                            <h2><?php echo $item['title']; ?></h2>
                                        </a>
                                    </div>
                                    <div style="display: flex; flex-direction: column; width: 100%; align-items: center; justify-content: center;">
                                        <a class="download-card-button" id="edit-b" href="edit.php?id=<?php echo($item['id']) ?>&category=decals">Modifier</a>
                                        <a class="download-card-button" id="delete-b" href="delete.php?id=<?php echo($item['id']) ?>&category=decals">Supprimer</a>
                                    </div>
                                </div>
                            <?php } ?>
                            <a class="button-empty" href="add.php?decals">Créer une nouvelle ressource</a>
                        <?php } else { ?>
                            <div style="grid-column-start: 1; grid-column-end: 5; display: flex; flex-direction: column; justify-content: center; align-items: center">
                                <p class="text-empty">Aucune ressource :(</p>
                                <a class="button-empty" href="add.php?zebra">Commence Maintenant</a>
                            </div>
                        <?php } ?>
                    </div>
                    <div id="template-b-div-a">
                        <?php
                        $creator_list = [
                            'azok30',
                            'rytrak',
                            'w4nou',
                            'itzdannio25',
                            'alexcars',
                            'sgm',
                            'other',
                        ]; ?>
                        <?php foreach ($creator_list as $table) {
                            $CapName = ucfirst($table);?>
                            <details>
                                <summary><?php echo ($CapName); ?></summary>
                                <div id="creator_container">
                                    <?php if (!empty(getAllTable($table))) { ?>
                                        <?php foreach (getAllTable($table) as $item ) { ?>
                                            <div class="download-card">
                                                <div class="download-card-image">
                                                    <?php if(strpos($item['photo'], "http://") === 0 || strpos($item['photo'], "https://") === 0) { ?>
                                                        <img src="<?php echo($item['photo']) ?>"
                                                             alt="<?php echo $item['title']; ?>" loading="lazy">
                                                    <?php } else { ?>
                                                        <img src="../../<?php echo $item['photo']; ?>"
                                                             alt="<?php echo $item['title']; ?>" loading="lazy">
                                                    <?php } ?>
                                                </div>
                                                <div class="download-card-text">
                                                    <a href="<?php echo($item['url']) ?>">
                                                        <h2><?php echo $item['title']; ?></h2>
                                                    </a>
                                                </div>
                                                <div style="display: flex; flex-direction: column; width: 100%; align-items: center; justify-content: center;">
                                                    <a class="download-card-button" id="edit-b" href="edit.php?id=<?php echo($item['id']) ?>&category=<?php echo $table?>">Modifier</a>
                                                    <a class="download-card-button" id="delete-b" href="delete.php?id=<?php echo($item['id']) ?>&category=<?php echo $table?>">Supprimer</a>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <a class="button-empty" href="add.php?<?php echo $table?>">Créer une nouvelle ressource</a>
                                    <?php } else { ?>
                                        <div style="grid-column-start: 1; grid-column-end: 5; display: flex; flex-direction: column; justify-content: center; align-items: center">
                                            <p class="text-empty">Rien n'a été créé dans <?php echo($table)?> :(</p>
                                        </div>
                                    <?php } ?>
                                </div>
                            </details>
                        <?php } ?>
                    </div>
                    <div id="community-b-div">
                        <?php
                        $community_list = [
                            'zebra_c',
                            'decals_c',
                            'other',
                        ];
                        ?>
                        <?php foreach ($community_list as $table) { ?>
                            <?php if (!empty(getAllTable($table))) { ?>
                                <?php foreach (getAllTable($table) as $item ) { ?>
                                    <div class="download-card">
                                        <div class="download-card-image">
                                            <?php if(strpos($item['photo'], "http://") === 0 || strpos($item['photo'], "https://") === 0) { ?>
                                                <img src="<?php echo($item['photo']) ?>"
                                                     alt="<?php echo $item['title']; ?>" loading="lazy">
                                            <?php } else { ?>
                                                <img src="../../<?php echo $item['photo']; ?>"
                                                     alt="<?php echo $item['title']; ?>" loading="lazy">
                                            <?php } ?>
                                        </div>
                                        <div class="download-card-text">
                                            <a href="<?php echo($item['url']) ?>">
                                                <h2><?php echo $item['title']; ?></h2>
                                            </a>
                                            <p>Upload par: <?php echo $item['creator_name']; ?></p>
                                            <p>Crée par: <?php echo $item['workshop_name']; ?></p>
                                            <p>Status: <?php if($item['is_enabled'] === 1) {
                                                    echo('<span style="color: darkgreen">Activé</span>');
                                                } else {
                                                    echo('<span style="color: darkred">Désactivé</span>');
                                                } ?></p>
                                        </div>
                                        <div style="display: flex; flex-direction: column; width: 100%; align-items: center; justify-content: center;">
                                            <a class="download-card-button" id="edit-b" href="edit.php?id=<?php echo($item['id']) ?>&category=<?php echo $table?>">Modifier</a>
                                            <a class="download-card-button" id="delete-b" href="delete.php?id=<?php echo($item['id']) ?>&category=<?php echo $table?>">Supprimer</a>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } else { ?>
                                <div style="grid-column-start: 1; grid-column-end: 5; display: flex; flex-direction: column; justify-content: center; align-items: center">
                                    <p class="text-empty">Rien n'a été créé dans <?php echo($table)?> :(</p>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </section>
        <?php } ?>
    </main>
<?php include_once '../../components/footer.php'; ?>
<script src="../../js/panel.js"></script>
</body>
</html>

