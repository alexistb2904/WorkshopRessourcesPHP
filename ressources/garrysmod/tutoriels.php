<?php
const BY_SERVER = true;
include_once '../../util/functions.php';
include_once '../../util/variables.php';
startSession();

$titleOfPage = 'Tutoriels';
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
            <section class="tutorial-section">
                  <h1>Liste de Tutoriels</h1>
                  <div class="tutorial-div">
                        <div class="tutorial-item">
                              <h2>Apprendre à Reskin</h2>
                              <iframe src="https://www.youtube.com/embed/TDt6f6G51BQ" title="YouTube video player"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen></iframe>
                              <div class="tutorial-description">
                                    <p>Liens Utiles</p>
                                    <ul>
                                          <li><a href="https://web.archive.org/web/20170913055549/http://nemesis.thewavelength.net/index.php?c=238#p238
                                    " target="_blank">VTFEdit</a></li>
                                          <li><a href="https://github.com/Dima-369/VMT-Editor"
                                                      target="_blank">VMTEditor</a></li>
                                          <li><a href="https://github.com/ZeqMacaw/Crowbar/releases"
                                                      target="_blank">Crowbar</a></li>
                                          <li><a href="" target="_blank">Script Python [NON DISPO]</a></li>
                                          <li><a href="https://youtu.be/TDt6f6G51BQ" target="_blank">Lien Youtube</a>
                                          </li>
                                          <li><a href="" target="_blank"></a></li>
                                    </ul>
                              </div>
                        </div>
                        <div>
            </section>
      </main>
      <?php include_once '../../components/footer.php'; ?>
</body>

</html>