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
        if (!isset($postData['title']) || !isset($postData['category']) || !isset($postData['creator_name'])) {
            $errorMessage = 'Les Champs doivent être remplis pour pouvoir créer une ressource. ERROR1';
        } else {
            if (empty($postData['title']) || empty($postData['category']) || empty($postData['creator_name'])) {
                $errorMessage = 'Les Champs doivent être remplis pour pouvoir créer une ressource. ERROR2';
            } else {
                if ($postData['category'] === 'other') {
                    if (!isset($postData['url'])) {
                        $errorMessage = 'Les Champs doivent être remplis pour pouvoir créer une ressource. ERROR3';
                    } else {
                        if (empty($postData['url'])) {
                            $errorMessage = 'Les Champs doivent être remplis pour pouvoir créer une ressource. ERROR4';
                        } else {
                            $title = htmlspecialchars($postData['title']);
                            if (htmlspecialchars($postData['workshop_name']) === '') {
                                $workshop_name = 'Inconnu';
                            } else {
                                $workshop_name = htmlspecialchars($postData['workshop_name']);
                            }


                            $url = htmlspecialchars($postData['url']);
                            $table = htmlspecialchars($postData['category']);
                            $creator_name = htmlspecialchars($postData['creator_name']);
                            $photo = htmlspecialchars($postData['photo']);
                            $insertRecipe = $mysqlClient->prepare('INSERT INTO ' . $table . ' (title, url, photo, creator_name, workshop_name) VALUES (:title, :url, :photo, :creator_name, :workshop_name)');
                            $insertRecipe->execute([
                                'title' => $title,
                                'url' => $url,
                                'photo' => $photo,
                                'creator_name' => $creator_name,
                                'workshop_name' => $workshop_name,
                            ]);

                            $created = true;
                        }
                    }
                } else {
                    $title = htmlspecialchars($postData['title']);
                    if (htmlspecialchars($postData['workshop_name']) === '') {
                        $workshop_name = 'Inconnu';
                    } else {
                        $workshop_name = htmlspecialchars($postData['workshop_name']);
                    }
                    if (!empty($_FILES['photo_file']['name'])) {
                        $PhotoImgur = $_FILES['photo_file'];
                        $curl = curl_init();

                        curl_setopt_array(
                            $curl,
                            array(
                                CURLOPT_URL => 'https://api.imgur.com/3/image',
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => '',
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 0,
                                CURLOPT_FOLLOWLOCATION => true,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => 'POST',
                                CURLOPT_POSTFIELDS => array('image' => base64_encode(file_get_contents($PhotoImgur['tmp_name'][0]))),
                                CURLOPT_HTTPHEADER => array(
                                    'Authorization: Client-ID f040db64c4332f9'
                                ),
                            )
                        );

                        $response = curl_exec($curl);
                        curl_close($curl);
                        $response = json_decode($response, true);
                        if ($response['success'] === true) {
                            $photo = $response['data']['link'];
                            $photoDeleteHash = $response['data']['deletehash'];
                        } else {
                            $errorMessage = 'Les Champs doivent être remplis pour pouvoir créer une ressource. ERROR4';
                            return;
                        }
                    } else if (htmlspecialchars($postData['photo']) != '') {
                        $photo = htmlspecialchars($postData['photo']);
                        $photoDeleteHash = '';
                    } else {
                        $errorMessage = 'Les Champs doivent être remplis pour pouvoir créer une ressource. ERROR5';
                        return;
                    }

                    $url = '';
                    $table = htmlspecialchars($postData['category']);
                    $creator_name = htmlspecialchars($postData['creator_name']);

                    if ($postData['category'] === 'novalife_flocage') {
                        $insertRecipe = $mysqlClient->prepare('INSERT INTO ' . $table . ' (title, photo, creator_name, photo_deletehash) VALUES (:title, :photo, :creator_name, :photo_deletehash)');
                        $insertRecipe->execute([
                            'title' => $title,
                            'photo' => $photo,
                            'creator_name' => $creator_name,
                            'photo_deletehash' => $photoDeleteHash,
                        ]);
                    } else {
                        $insertRecipe = $mysqlClient->prepare('INSERT INTO ' . $table . ' (title, url, photo, creator_name, workshop_name, photo_deletehash) VALUES (:title, :url, :photo, :creator_name, :workshop_name, :photo_deletehash)');
                        $insertRecipe->execute([
                            'title' => $title,
                            'url' => $url,
                            'photo' => $photo,
                            'creator_name' => $creator_name,
                            'workshop_name' => $workshop_name,
                            'photo_deletehash' => $photoDeleteHash,
                        ]);
                    }

                    $created = true;
                }
            }
        }
    } else {
        $errorMessage = 'Il faut être connecté pour pouvoir créer une ressource.';
    }
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
    <title>WorkshopRessources - Ajout</title>
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
            <?php if (!isset($created) || $created !== true) { ?>
                <?php if (isset($_GET['other']) || isset($_GET['zebra']) || isset($_GET['decals']) || isset($_GET['novalife_flocage'])) { ?>
                    <section class="category-container">
                        <form action="" method="post" enctype="multipart/form-data" id="creation-form">
                            <h1>Création de contenu</h1>
                            <?php if (isset($errorMessage)) { ?>
                                <div class="error-message">
                                    <p style="color: gray;">
                                        <?php echo ($errorMessage) ?>
                                    </p>
                                </div>
                            <?php } ?>
                            <div class="part-form">
                                <label for="title" class="form-label">Titre du contenu*</label>
                                <input type="text" class="form-control" id="title" name="title" aria-describedby="title-help"
                                    placeholder="Titre du contenu" autocomplete="off" required title="Titre du contenu">
                            </div>
                            <div class="part-form">
                                <label for="workshop_name" class="form-label">Nom du créateur d'origine</label>
                                <input type="text" class="form-control" id="workshop_name" name="workshop_name"
                                    placeholder="Nom du créateur originel" autocomplete="off" title="Nom du créateur d'origine">
                            </div>
                            <?php if (isset($_GET['other'])) { ?>
                                <div class="part-form">
                                    <label for="url" class="form-label">Lien vers le contenu*</label>
                                    <input type="text" class="form-control" id="url" name="url"
                                        placeholder="Lien Direct vers le contenu" autocomplete="off" maxlength="512" required
                                        title="Lien vers le contenu">
                                </div>
                            <?php } ?>
                            <div class="part-form">
                                <label for="photo" class="form-label">Lien ou choisir l'image*</label>
                                <input type="text" class="form-control" id="photo" name="photo" placeholder="Url de l'image"
                                    autocomplete="off" title="Lien Image" maxlength="512">
                                <label class="form-label" id="labelFile"><i class="fa-regular fa-file"></i> <span>Choisir une
                                        image</span><input type="file" class="form-control" id="photo_file" name="photo_file[]"
                                        accept=".png, .jpeg, .webp, .svg, .jpg, image/*" title="Emplacment Image">
                            </div>

                            <label hidden>
                                <input type="text" name="send" value="send" hidden>
                                <?php if (isset($_GET['other'])) { ?>
                                    <input type="text" name="category" value="other" hidden>
                                <?php } elseif (isset($_GET['zebra'])) { ?>
                                    <input type="text" name="category" value="zebra_c" hidden>
                                <?php } elseif (isset($_GET['decals'])) { ?>
                                    <input type="text" name="category" value="decals_c" hidden>
                                <?php } elseif (isset($_GET['novalife_flocage'])) { ?>
                                    <input type="text" name="category" value="novalife_flocage" hidden>
                                <?php } ?>
                                <input type="text" name="creator_name" value="<?php echo ($_SESSION['username']) ?>" hidden>
                            </label>
                            <button type="submit">Envoyer</button>
                        </form>
                    </section>
                <?php } else { ?>
                    <section class="header-text">
                        <div>
                            <h1>Oups..</h1>
                            <p>Tu dois préciser dans quelle catégorie tu souhaites créer du contenu</p>
                        </div>
                        <a class="glow-button-a" href="<?php echo ($GLOBALS['rootUrl']) ?>panel/index.php">
                            <button class="glow-button">PANEL</button>
                        </a>
                    </section>
                <?php } ?>
            <?php } else { ?>
                <section class="header-text">
                    <div>
                        <h1>Bravo !</h1>
                        <p>Ton contenu a bien été crée, il va bientôt être examiné par notre équipe.</p>
                    </div>
                    <a class="glow-button-a" href="<?php echo ($GLOBALS['rootUrl']) ?>panel/index.php">
                        <button class="glow-button">PANEL</button>
                    </a>
                </section>
            <?php } ?>
        <?php } ?>
    </main>
    <?php include_once '../components/footer.php'; ?>
    <script src="<?php echo ($GLOBALS['rootUrl']) ?>js/add.js"></script>
</body>

</html>