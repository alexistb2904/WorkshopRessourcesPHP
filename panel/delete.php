<?php
const BY_SERVER = true;
include_once '../util/functions.php';
include_once '../util/variables.php';
startSession();
$mysqlClient = $GLOBALS['mysqlClientPDO'];
$rootUrl = $GLOBALS['rootUrl'];
$postData = $_POST;
if (isset($postData['send'])) {
    if (isLogged()) {
        if (isset($postData['category']) && isset($postData['creator_name'])) {
            if (getCreatorById($_GET['id'], $postData['category'])[0]['creator_name'] == $_SESSION['username']) {
                $id = htmlspecialchars($_GET['id']);
                $creator = htmlspecialchars($postData['category']);
                if ($postData['category'] == 'novalife_flocage') {
                    $deleteHash = getById($id, $creator)[0]['photo_deletehash'];
                    $curl = curl_init();

                    curl_setopt_array(
                        $curl,
                        array(
                            CURLOPT_URL => 'https://api.imgur.com/3/image/' . $deleteHash,
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => '',
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 0,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => 'DELETE',
                            CURLOPT_HTTPHEADER => array(
                                'Authorization: Client-ID f040db64c4332f9'
                            ),
                        )
                    );

                    $response = curl_exec($curl);
                    curl_close($curl);
                    $response = json_decode($response, true);
                    if ($response['success'] === true) {
                        $deleteRecipeStatement = $GLOBALS['mysqlClient']->prepare('DELETE FROM ' . $creator . ' WHERE id = :id');
                        $deleteRecipeStatement->execute([
                            'id' => $id,
                        ]);
                    } else {
                        $errorMessage = 'Une erreur est surevenue lors de la suppression.';
                        return;
                    }

                } else {
                    $deleteRecipeStatement = $GLOBALS['mysqlClient']->prepare('DELETE FROM ' . $creator . ' WHERE id = :id');
                    $deleteRecipeStatement->execute([
                        'id' => $id,
                    ]);
                }
                $deleted = true;
            } else {
                $errorMessage = 'Cette ressource ne t\'appartient pas';
            }
        } else {
            $errorMessage = 'Nous n\'avons pas toutes les informations nécessaires à ta demande';
        }
    } else {
        $errorMessage = 'Il faut être connecté pour pouvoir créer une ressource.';
    }
}
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
    <meta name="twitter:title" content="WorkshopRessources +100 Ressources pour vous">
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
    <title>WorkshopRessources - Suppression</title>
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
            <?php if (!isset($deleted) || $deleted !== true) { ?>
                <?php if (isset($_GET['category']) && (($_GET['category'] === 'zebra') || ($_GET['category'] === 'other') || ($_GET['category'] === 'decals') || ($_GET['category'] === 'novalife_flocage')) && isset($_GET['id'])) { ?>
                    <?php if ($_GET['category'] === 'zebra') {
                        $_GET['category'] = 'zebra_c';
                    } elseif ($_GET['category'] === 'decals') {
                        $_GET['category'] = 'decals_c';
                    } elseif ($_GET['category'] === 'other') {
                        $_GET['category'] = 'other';
                    } elseif ($_GET['category'] === 'novalife_flocage') {
                        $_GET['category'] = 'novalife_flocage';
                    } ?>
                    <?php if (isset(getCreatorById($_GET['id'], $_GET['category'])[0]['creator_name'])) { ?>
                        <?php if (getCreatorById($_GET['id'], $_GET['category'])[0]['creator_name'] == $_SESSION['username']) { ?>
                            <?php $items = getById($_GET['id'], $_GET['category']); ?>
                            <?php if (!empty($items)) { ?>
                                <?php foreach ($items as $item) { ?>
                                    <section class="category-container">
                                        <form action="" method="post">
                                            <h1>Suppression de contenu</h1>
                                            <?php if (isset($errorMessage)) { ?>
                                                <div class="error-message">
                                                    <p style="color: gray;">
                                                        <?php echo ($errorMessage) ?>
                                                    </p>
                                                </div>
                                            <?php } ?>
                                            <div class="part-form">
                                                <label for="title" class="form-label">Titre du contenu</label>
                                                <input type="text" class="form-control" id="title" name="title" aria-describedby="title-help"
                                                    value="<?php echo ($item['title']) ?>" placeholder="Titre du contenu" autocomplete="off"
                                                    required readonly>
                                            </div>
                                            <?php if (($_GET['category'] != 'novalife_flocage')) { ?>
                                                <div class="part-form">
                                                    <label for="creator_name" class="form-label">Nom du créateur</label>
                                                    <input type="text" class="form-control" id="creator_name" name="creator_name"
                                                        placeholder="Nom du créateur" value="<?php echo ($item['creator_name']) ?>" autocomplete="off"
                                                        required readonly>
                                                </div>
                                            <?php } ?>
                                            <?php if (($_GET['category'] === 'other')) { ?>
                                                <div class="part-form">
                                                    <label for="url" class="form-label">Lien vers le contenu</label>
                                                    <input type="text" class="form-control" id="url" name="url"
                                                        placeholder="Lien Direct vers le contenu" value="<?php echo ($item['url']) ?>"
                                                        autocomplete="off" maxlength="512" required readonly>
                                                </div>
                                            <?php } ?>
                                            <div class="part-form">
                                                <label for="photo" class="form-label">Lien vers l'image</label>
                                                <input type="text" class="form-control" id="photo" name="photo"
                                                    placeholder="Lien Direct vers l'image" autocomplete="off" value="<?php echo ($item['photo']) ?>"
                                                    maxlength="512" required readonly>
                                            </div>
                                            <label hidden>
                                                <input type="text" name="send" value="send" hidden>
                                                <input type="text" name="category" value="<?php echo ($_GET['category']) ?>" hidden>
                                                <input type="text" name="creator_name" value="<?php echo ($_SESSION['username']) ?>" hidden>
                                            </label>
                                            <button type="submit">Supprimer</button>
                                        </form>
                                    </section>
                                <?php } ?>
                            <?php } else { ?>
                                <section class="header-text">
                                    <div>
                                        <h1>Oups..</h1>
                                        <p>L'ID que tu nous as fournis n'est pas reconnu</p>
                                    </div>
                                    <a class="glow-button-a" href="<?php echo ($GLOBALS['rootUrl']) ?>panel/index.php">
                                        <button class="glow-button">PANEL</button>
                                    </a>
                                </section>
                            <?php } ?>
                        <?php } else { ?>
                            <section class="header-text">
                                <div>
                                    <h1>Oups..</h1>
                                    <p>Cette ressource ne t'appartient pas</p>
                                </div>
                                <a class="glow-button-a" href="<?php echo ($GLOBALS['rootUrl']) ?>panel/index.php">
                                    <button class="glow-button">PANEL</button>
                                </a>
                            </section>
                        <?php } ?>
                    <?php } else { ?>
                        <section class="header-text">
                            <div>
                                <h1>Oups..</h1>
                                <p>L'ID que tu nous as fournis n'est pas reconnu</p>
                            </div>
                            <a class="glow-button-a" href="<?php echo ($GLOBALS['rootUrl']) ?>panel/index.php">
                                <button class="glow-button">PANEL</button>
                            </a>
                        </section>
                    <?php } ?>
                <?php } else { ?>
                    <section class="header-text">
                        <div>
                            <h1>Oups..</h1>
                            <p>Nous n'avons pas toutes les informations nécessaires à ta demande</p>
                        </div>
                        <a class="glow-button-a" href="<?php echo ($GLOBALS['rootUrl']) ?>panel/index.php">
                            <button class="glow-button">PANEL</button>
                        </a>
                    </section>
                <?php } ?>
            <?php } else { ?>
                <section class="header-text">
                    <div>
                        <h1>Hmm..</h1>
                        <p>Ton contenu a bien été supprimé, bravo je suppose ?</p>
                    </div>
                    <a class="glow-button-a" href="<?php echo ($GLOBALS['rootUrl']) ?>panel/index.php">
                        <button class="glow-button">PANEL</button>
                    </a>
                </section>
            <?php } ?>
        <?php } ?>
    </main>
    <?php include_once '../components/footer.php'; ?>
</body>

</html>