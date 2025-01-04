<?php
const BY_SERVER = true;
include_once '../../util/functions.php';
include_once '../../util/variables.php';
startSession();
$mysqlClient = $GLOBALS['mysqlClientPDO'];
$rootUrl = $GLOBALS['rootUrl'];
$postData = $_POST;
if (isset($postData['send'])) {
    if (isLogged() && isAdmin($_SESSION['email'])) {
        if (!isset($postData['title']) || !isset($postData['category']) ) {
            $errorMessage = 'Les Champs doivent être remplis pour pouvoir créer une ressource. ERROR1';
        } else {
            if (empty($postData['title']) || empty($postData['category'])  ) {
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
                            $photo = htmlspecialchars($postData['photo']);
                            $url = htmlspecialchars($postData['url']);
                            $table = htmlspecialchars($postData['category']);
                            $creator_name = htmlspecialchars($_SESSION['username']);
                            if (!isAllowed($table)) {
                                echo 'Erreur la table '. $table . ' n\'existe pas';
                                return null;
                            }
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
                    if ($postData['photo'] == '') {
                    $title = htmlspecialchars($postData['title']);
                    if (htmlspecialchars($postData['workshop_name']) === '') {
                        $workshop_name = 'Inconnu';
                    } else {
                        $workshop_name = htmlspecialchars($postData['workshop_name']);
                    }
                    
                    if (htmlspecialchars($postData['url']) === '') {
                        $url = '';
                    } else {
                        $url = htmlspecialchars($postData['url']);
                    }
                    $table = htmlspecialchars($postData['category']);
                    $creator_name = htmlspecialchars($_SESSION['username']);
                    $photo = '';
                    $photo_windows = 0;
                    $photoDeleteHash = 0;
                    $photoWindowsDeleteHash = 0;
                    if (!empty($_FILES['photo_file']['name'])) {
                        $photo = uploadImage($_FILES['photo_file']);
                        $photoDeleteHash = $photo['deletehash'];
                        $photo = $photo['photo'];
                    }
                    if (!empty($_FILES['photo_file_windows']['name'])) {
                        $photo_windows = uploadImage($_FILES['photo_file_windows']);
                        $photoWindowsDeleteHash = $photo_windows['deletehash'];
                        $photo_windows = $photo_windows['photo'];
                    }

                    if (!isAllowed($table)) {
                        echo 'Erreur la table '. $table . ' n\'existe pas';
                        return null;
                    }
                    if ($photo == '') {
                        $errorMessage = 'Erreur lors de l\'upload de l\'image';
                        $created = false;
                    } else {
                        // Est-ce que l'image de la fenêtre existe ?
                        if ($photo_windows == 0 || $photo_windows == '') {
                            if ($table === 'zebra' || $table === 'decals' || $table === 'novalife') {
                                $insertRecipe = $mysqlClient->prepare('INSERT INTO ' . $table . ' (title, url, photo, photo_deletehash, is_enabled) VALUES (:title, :url, :photo, :photo_deletehash, :is_enabled)');
                                $insertRecipe->execute([
                                    'title' => $title,
                                    'url' => $url,
                                    'photo' => $photo,
                                    'photo_deletehash' => $photoDeleteHash,
                                    'is_enabled' => '1',
                                ]);
                            } else {
                                $insertRecipe = $mysqlClient->prepare('INSERT INTO ' . $table . ' (title, url, photo, photo_deletehash) VALUES (:title, :url, :photo, :photo_deletehash)');
                                $insertRecipe->execute([
                                    'title' => $title,
                                    'url' => $url,
                                    'photo' => $photo,
                                    'photo_deletehash' => $photoDeleteHash,
                                ]);
                            }

                            $created = true;
                        } else {
                            if ($table === 'zebra' || $table === 'decals' || $table === 'novalife') {
                                $insertRecipe = $mysqlClient->prepare('INSERT INTO ' . $table . ' (title, url, photo, photo_deletehash, is_enabled) VALUES (:title, :url, :photo, :photo_deletehash, :is_enabled)');
                                $insertRecipe->execute([
                                    'title' => $title,
                                    'url' => $url,
                                    'photo' => $photo,
                                    'photo_deletehash' => $photoDeleteHash,
                                    'is_enabled' => '1',
                                ]);

                                $windowsRequest = $mysqlClient->prepare('INSERT INTO ' . $table . ' (title, url, photo, photo_deletehash, is_enabled) VALUES (:title, :url, :photo, :photo_deletehash, :is_enabled)');
                                $windowsRequest->execute([
                                    'title' => $title + ' - Fenêtre',
                                    'url' => $url,
                                    'photo' => $photo_windows,
                                    'photo_deletehash' => $photoWindowsDeleteHash,
                                    'is_enabled' => '1',
                                ]);
                            } else {
                                $insertRecipe = $mysqlClient->prepare('INSERT INTO ' . $table . ' (title, url, photo, photo_deletehash) VALUES (:title, :url, :photo, :photo_deletehash)');
                                $insertRecipe->execute([
                                    'title' => $title,
                                    'url' => $url,
                                    'photo' => $photo,
                                    'photo_deletehash' => $photoWindowsDeleteHash,
                                ]);

                                $windowsRequest = $mysqlClient->prepare('INSERT INTO ' . $table . ' (title, url, photo, photo_deletehash, is_enabled) VALUES (:title, :url, :photo, :photo_deletehash, :is_enabled)');
                                $windowsRequest->execute([
                                    'title' => $title + ' - Fenêtre',
                                    'url' => $url,
                                    'photo' => $photo_windows,
                                    'photo_deletehash' => $photoWindowsDeleteHash,
                                ]);
                            }

                            if ($photo_windows == '' ) {
                                $errorMessage = 'Erreur lors de l\'upload de l\'image de la fenêtre';
                            }
                            $created = true;
                        }
                    }
                } else {
                    $photo = htmlspecialchars($postData['photo']);
                    $title = htmlspecialchars($postData['title']);
                    if (htmlspecialchars($postData['workshop_name']) === '') {
                        $workshop_name = 'Inconnu';
                    } else {
                        $workshop_name = htmlspecialchars($postData['workshop_name']);
                    }
                    
                    if (htmlspecialchars($postData['url']) === '') {
                        $url = '';
                    } else {
                        $url = htmlspecialchars($postData['url']);
                    }
                    $table = htmlspecialchars($postData['category']);
                    $creator_name = htmlspecialchars($_SESSION['username']);
                    if (!isAllowed($table)) {
                        echo 'Erreur la table '. $table . ' n\'existe pas';
                        return null;
                    }
                    if ($table === 'zebra' || $table === 'decals' || $table === 'novalife') {
                        $insertRecipe = $mysqlClient->prepare('INSERT INTO ' . $table . ' (title, url, photo, is_enabled) VALUES (:title, :url, :photo, :is_enabled)');
                        $insertRecipe->execute([
                            'title' => $title,
                            'url' => $url,
                            'photo' => $photo,
                            'is_enabled' => '1',
                        ]);
                    } else {
                        $insertRecipe = $mysqlClient->prepare('INSERT INTO ' . $table . ' (title, url, photo) VALUES (:title, :url, :photo)');
                        $insertRecipe->execute([
                            'title' => $title,
                            'url' => $url,
                            'photo' => $photo,
                        ]);
                    }
                    $created = true;
                }
            }
            }
        }
    } else {
        $errorMessage = 'Il faut être connecté ou avoir la permission pour pouvoir créer une ressource administrateur.';
    }
}

function uploadImage($PhotoImgur) {
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
                CURLOPT_POSTFIELDS => array('image' => base64_encode(file_get_contents($PhotoImgur['tmp_name']))),
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
            return ['photo' => $photo, 'deletehash' => $photoDeleteHash];
        } else {
            $errorMessage = 'Les Champs doivent être remplis pour pouvoir créer une ressource. ERROR4';
            return ['photo' => '', 'deletehash' => ''];
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
        <?php include_once '../../components/nav_bar.php' ?>
    </header>
    <main>
        <?php if (isLogged() === false || !isAdmin($_SESSION['email'])) { ?>
            <section class="header-text">
                <div>
                    <h1>Oups..</h1>
                    <p>Tu dois être connecté ou avoir la permission pour accéder à cette page</p>
                </div>
                <a class="glow-button-a" href="<?php echo ($GLOBALS['rootUrl']) ?>login.php">
                    <button class="glow-button">ME CONNECTER</button>
                </a>
            </section>
        <?php } else { ?>
            <?php if (!isset($created) || $created !== true) { ?>
                <?php if (isset($_GET['other']) || isset($_GET['zebra']) || isset($_GET['decals']) || isset($_GET['novalife']) || isset($_GET['alexcars']) || isset($_GET['azok30']) || isset($_GET['itzdannio25']) || isset($_GET['rytrak']) || isset($_GET['sgm']) || isset($_GET['w4nou'])) { ?>
                    <section class="category-container">
                        <form action="" method="post" enctype="multipart/form-data">
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
                                    placeholder="Titre du contenu" autocomplete="off" required>
                            </div>
                            <div class="part-form">
                                <label for="workshop_name" class="form-label">Nom du créateur originel</label>
                                <input type="text" class="form-control" id="workshop_name" name="workshop_name"
                                    placeholder="Nom du créateur originel" autocomplete="off">
                            </div>
                            <?php if (!isset($_GET['zebra']) || !isset($_GET['decals']) || !isset($_GET['novalife'])) { ?>
                                <div class="part-form">
                                    <label for="url" class="form-label">Lien du workshop*</label>
                                    <input type="text" class="form-control" id="url" name="url"
                                        placeholder="Lien Direct vers le contenu" autocomplete="off" maxlength="512" required>
                                </div>
                            <?php } ?>
                            <div class="part-form">
                                <input type="text" class="form-control" id="photo" name="photo" placeholder="Url de l'image" autocomplete="off" title="Lien Image" maxlength="512">
                                <label class="form-label" id="labelFile"><i class="fa-regular fa-file"></i> <span>Choisir une
                                        image *</span><input type="file" class="form-control" id="photo_file" name="photo_file" accept=".png, .jpeg, .jpg, image/*"
                                        title="Emplacement Image" required>
                                </label>
                                <label class="form-label" id="labelFile2"><i class="fa-regular fa-file"></i> <span>Choisir une
                                        image fenêtre</span><input type="file" class="form-control" id="photo_file_windows" name="photo_file_windows" accept=".png, .jpeg, .jpg, image/*"
                                        title="Emplacement Image Fenêtre">
                                </label>
                            </div>
                            <div class="part-form">
                                <label for="category" class="form-label">Catégorie</label>
                                <select name="category" id="category" required>
                                    <option value="zebra" <?php if (isset($_GET['zebra'])) {
                                        echo "selected";
                                    } ?>>Zébra</option>
                                    <option value="decals" <?php if (isset($_GET['decals'])) {
                                        echo "selected";
                                    } ?>>Décals</option>
                                    <option value="novalife" <?php if (isset($_GET['novalife'])) {
                                        echo "selected";
                                    } ?>>Nova-Life
                                    </option>
                                    <option value="alexcars" <?php if (isset($_GET['alexcars'])) {
                                        echo "selected";
                                    } ?>>AlexCars
                                    </option>
                                    <option value="azok30" <?php if (isset($_GET['azok30'])) {
                                        echo "selected";
                                    } ?>>Azok30</option>
                                    <option value="itzdannio25" <?php if (isset($_GET['itzdannio25'])) {
                                        echo "selected";
                                    } ?>>
                                        ItzDannio25</option>
                                    <option value="rytrak" <?php if (isset($_GET['rytrak'])) {
                                        echo "selected";
                                    } ?>>Rytrak</option>
                                    <option value="sgm" <?php if (isset($_GET['sgm'])) {
                                        echo "selected";
                                    } ?>>SGM</option>
                                    <option value="w4nou" <?php if (isset($_GET['w4nou'])) {
                                        echo "selected";
                                    } ?>>W4nou</option>
                                </select>
                            </div>
                            <label hidden>
                                <input type="text" name="send" value="send" hidden>
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
                        <a class="glow-button-a" href="<?php echo ($GLOBALS['rootUrl']) ?>panel/admin/index.php">
                            <button class="glow-button">PANEL</button>
                        </a>
                    </section>
                <?php } ?>
            <?php } else { ?>
                <section class="header-text">
                    <div>
                        <h1>Bravo !</h1>
                        <p>Ton contenu a bien été crée.</p>
                    </div>
                    <a class="glow-button-a" href="<?php echo ($GLOBALS['rootUrl']) ?>panel/admin/index.php">
                        <button class="glow-button">PANEL</button>
                    </a>
                </section>
            <?php } ?>
        <?php } ?>
    </main>
    <?php include_once '../../components/footer.php'; ?>
    <script src="<?php echo ($GLOBALS['rootUrl']) ?>js/add.js"></script>
</body>

</html>