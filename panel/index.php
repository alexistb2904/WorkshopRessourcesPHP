<?php
const BY_SERVER = true;
include_once '../util/functions.php';
include_once '../util/variables.php';
?>

<!DOCTYPE html>
<html lang="<?= $GLOBALS['lang'] ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Optimisez vos projets avec WorkshopRessource : découvrez nos outils exclusifs, incluant des décals et autres ressources, 100% Open-Source. Accédez à des tutoriels détaillés pour enrichir vos compétences. Élevez la qualité de vos projets grâce à des ressources exceptionnelles.">
    <meta name="keywords"
        content="workshop, ressources, gratuit, tutoriels, gmod, zébra, decals, template, créateur, jeu, garry's mod, novalife, nova-life">
    <meta name="author" content="Alexis Thierry-Bellefond">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@alexistb2904">
    <meta name="twitter:title" content="WorkshopRessources - Panel">
    <meta name="twitter:description"
        content="Optimisez vos projets avec WorkshopRessource : découvrez nos outils exclusifs, incluant des décals et autres ressources, 100% Open-Source. Accédez à des tutoriels détaillés pour enrichir vos compétences. Élevez la qualité de vos projets grâce à des ressources exceptionnelles.">
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
    <title>WorkshopRessources - Panel</title>
</head>

<body>
    <header>
        <?php include_once '../components/nav_bar.php' ?>
    </header>
    <main>
        <?php if (isLogged() === false) { ?>
            <section class="header-text">
                <div>
                    <h1>Oups..</h1>
                    <p>Tu dois être connecté pour accéder à cette page</p>
                </div>
                <a class="glow-button-a" href="<?php echo ($GLOBALS['rootUrl']) ?>login.php">
                    <button class="glow-button">ME CONNECTER</button>
                </a>
            </section>
        <?php } else { ?>
            <section class="header-text">
                <div>
                    <h1>Bienvenue
                        <?php echo ($_SESSION['username']) ?>
                    </h1>
                    <p>Tu es sur ton panel utilisateur qui va te permettre de partager des ressources</p>
                    <?php if (isAdmin($_SESSION['email'])) { ?>
                        <p><a href="admin/index.php">Panel Admin</a></p>
                    <?php } ?>
                </div>
            </section>
            <section class="category-container">
                <div class="category-div">
                    <a class="button-category" id="zebra-b" onclick="showZebra()">Zebra</a>
                    <a class="button-category" id="decals-b" onclick="showDecals()">Decals</a>
                    <a class="button-category" id="template-b" onclick="showTemplate()">Templates</a>
                    <a class="button-category" id="novalife-b" onclick="showNovaLife()">Nova-Life</a>
                </div>
                <div class="category-card-container">
                    <div id="zebra-b-div">
                        <?php if (!empty(getSelfTable('zebra_c'))) { ?>
                            <?php foreach (getSelfTable('zebra_c') as $item) { ?>
                                <div class="download-card">
                                    <div class="download-card-image">
                                        <?php if (strpos($item['photo'], "http://") === 0 || strpos($item['photo'], "https://") === 0) { ?>
                                            <img src="<?php echo ($item['photo']) ?>" alt="<?php echo $item['title']; ?>"
                                                loading="lazy">
                                        <?php } else { ?>
                                            <img src="../<?php echo $item['photo']; ?>" alt="<?php echo $item['title']; ?>"
                                                loading="lazy">
                                        <?php } ?>
                                    </div>
                                    <div class="download-card-text">
                                        <a href="<?php echo ($item['url']) ?>">
                                            <h2>
                                                <?php echo $item['title']; ?>
                                            </h2>
                                        </a>
                                        <p>Crée par:
                                            <?php echo $item['workshop_name']; ?>
                                        </p>
                                        <p>
                                            <?php if ($item['is_enabled'] === 1) {
                                                echo ('Activé');
                                            } else {
                                                echo ('Désactivé');
                                            } ?>
                                        </p>
                                    </div>
                                    <div
                                        style="display: flex; flex-direction: column; width: 100%; align-items: center; justify-content: center;">
                                        <a class="download-card-button" id="edit-b"
                                            href="edit.php?id=<?php echo ($item['id']) ?>&category=zebra">Modifier</a>
                                        <a class="download-card-button" id="delete-b"
                                            href="delete.php?id=<?php echo ($item['id']) ?>&category=zebra">Supprimer</a>
                                    </div>
                                </div>
                            <?php } ?>
                            <a class="button-empty" href="add.php?zebra">Créer une nouvelle ressource</a>
                        <?php } else { ?>
                            <div
                                style="grid-column-start: 1; grid-column-end: 5; display: flex; flex-direction: column; justify-content: center; align-items: center">
                                <p class="text-empty">Tu n'as rien créé :(</p>
                                <a class="button-empty" href="add.php?zebra">Commence Maintenant</a>
                            </div>
                        <?php } ?>
                    </div>
                    <div id="decals-b-div">
                        <?php if (!empty(getSelfTable('decals_c'))) { ?>
                            <?php foreach (getSelfTable('decals_c') as $item) { ?>
                                <div class="download-card">
                                    <div class="download-card-image">
                                        <?php if (strpos($item['photo'], "http://") === 0 || strpos($item['photo'], "https://") === 0) { ?>
                                            <img src="<?php echo ($item['photo']) ?>" alt="<?php echo $item['title']; ?>"
                                                loading="lazy">
                                        <?php } else { ?>
                                            <img src="../<?php echo $item['photo']; ?>" alt="<?php echo $item['title']; ?>"
                                                loading="lazy">
                                        <?php } ?>
                                    </div>
                                    <div class="download-card-text">
                                        <a href="<?php echo ($item['url']) ?>">
                                            <h2>
                                                <?php echo $item['title']; ?>
                                            </h2>
                                        </a>
                                        <p>Crée par:
                                            <?php echo $item['workshop_name']; ?>
                                        </p>
                                        <p>
                                            <?php if ($item['is_enabled'] === 1) {
                                                echo ('Approuvé');
                                            } else {
                                                echo ('En attente | Non approuvé');
                                            } ?>
                                        </p>
                                    </div>
                                    <div
                                        style="display: flex; flex-direction: column; width: 100%; align-items: center; justify-content: center;">
                                        <a class="download-card-button" id="edit-b"
                                            href="edit.php?id=<?php echo ($item['id']) ?>&category=decals">Modifier</a>
                                        <a class="download-card-button" id="delete-b"
                                            href="delete.php?id=<?php echo ($item['id']) ?>&category=decals">Supprimer</a>
                                    </div>
                                </div>
                            <?php } ?>
                            <a class="button-empty" href="add.php?decals">Créer une nouvelle ressource</a>
                        <?php } else { ?>
                            <div
                                style="grid-column-start: 1; grid-column-end: 5; display: flex; flex-direction: column; justify-content: center; align-items: center">
                                <p class="text-empty">Tu n'as rien créé :(</p>
                                <a class="button-empty" href="add.php?decals">Commence Maintenant</a>
                            </div>
                        <?php } ?>
                    </div>
                    <div id="template-b-div">
                        <?php if (!empty(getSelfTable('other'))) { ?>
                            <?php foreach (getSelfTable('other') as $item) { ?>
                                <div class="download-card">
                                    <div class="download-card-image">
                                        <?php if (strpos($item['photo'], "http://") === 0 || strpos($item['photo'], "https://") === 0) { ?>
                                            <img src="<?php echo ($item['photo']) ?>" alt="<?php echo $item['title']; ?>"
                                                loading="lazy">
                                        <?php } else { ?>
                                            <img src="../<?php echo $item['photo']; ?>" alt="<?php echo $item['title']; ?>"
                                                loading="lazy">
                                        <?php } ?>
                                    </div>
                                    <div class="download-card-text">
                                        <a href="<?php echo ($item['url']) ?>">
                                            <h2>
                                                <?php echo $item['title']; ?>
                                            </h2>
                                        </a>
                                        <p>Crée par:
                                            <?php echo $item['workshop_name']; ?>
                                        </p>
                                        <p>
                                            <?php if ($item['is_enabled'] === 1) {
                                                echo ('Approuvé');
                                            } else {
                                                echo ('En attente | Non approuvé');
                                            } ?>
                                        </p>
                                    </div>
                                    <div
                                        style="display: flex; flex-direction: column; width: 100%; align-items: center; justify-content: center;">
                                        <a class="download-card-button" id="edit-b"
                                            href="edit.php?id=<?php echo ($item['id']) ?>&category=other">Modifier</a>
                                        <a class="download-card-button" id="delete-b"
                                            href="delete.php?id=<?php echo ($item['id']) ?>&category=other">Supprimer</a>
                                    </div>
                                </div>
                            <?php } ?>
                            <a class="button-empty" href="add.php?other">Créer une nouvelle ressource</a>
                        <?php } else { ?>
                            <div
                                style="grid-column-start: 1; grid-column-end: 5; display: flex; flex-direction: column; justify-content: center; align-items: center">
                                <p class="text-empty">Tu n'as rien créé :(</p>
                                <a class="button-empty" href="add.php?other">Commence Maintenant</a>
                            </div>
                        <?php } ?>
                    </div>
                    <div id="novalife-b-div">
                        <?php if (!empty(getSelfTable('novalife_flocage'))) { ?>
                            <?php foreach (getSelfTable('novalife_flocage') as $item) { ?>
                                <div class="download-card">
                                    <div class="download-card-image">
                                        <?php if (strpos($item['photo'], "http://") === 0 || strpos($item['photo'], "https://") === 0) { ?>
                                            <img src="<?php echo ($item['photo']) ?>" alt="<?php echo $item['title']; ?>"
                                                loading="lazy">
                                        <?php } else { ?>
                                            <img src="../../<?php echo $item['photo']; ?>" alt="<?php echo $item['title']; ?>"
                                                loading="lazy">
                                        <?php } ?>
                                    </div>
                                    <div class="download-card-text">
                                        <a href="<?php echo ($item['photo']) ?>" target="_blank">
                                            <h2>
                                                <?php echo $item['title']; ?>
                                            </h2>
                                        </a>
                                        <p>Crée par:
                                            <?php echo $item['creator_name']; ?>
                                        </p>
                                        <p>
                                            <?php if ($item['is_enabled'] === 1) {
                                                echo ('Approuvé');
                                            } else {
                                                echo ('En attente | Non approuvé');
                                            } ?>
                                        </p>
                                    </div>
                                    <div
                                        style="display: flex; flex-direction: column; width: 100%; align-items: center; justify-content: center;">
                                        <a class="download-card-button" id="edit-b"
                                            href="edit.php?id=<?php echo ($item['id']) ?>&category=novalife_flocage">Modifier</a>
                                        <a class="download-card-button" id="delete-b"
                                            href="delete.php?id=<?php echo ($item['id']) ?>&category=novalife_flocage">Supprimer</a>
                                    </div>
                                </div>
                            <?php } ?>
                            <a class="button-empty" href="add.php?novalife_flocage">Créer une nouvelle ressource</a>
                        <?php } else { ?>
                            <div
                                style="grid-column-start: 1; grid-column-end: 5; display: flex; flex-direction: column; justify-content: center; align-items: center">
                                <p class="text-empty">Tu n'as rien créé :(</p>
                                <a class="button-empty" href="add.php?novalife_flocage">Commence Maintenant</a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
        <?php } ?>
    </main>
    <?php include_once '../components/footer.php'; ?>
    <script src="../js/panel.js"></script>
</body>

</html>