<?php session_start();
include_once('functions.php');?>
<!doctype html>
<html lang="fr">

<head>
    <title><?php echo($GLOBALS['rooturl'] )?></title>
    <!-- Required meta tags -->
    <link rel="stylesheet" href="<?php echo($GLOBALS['rooturl'] ). 'style.css'?>">
    <link rel="icon" href="<?php echo($GLOBALS['rooturl'] ). 'assets/img/Logo/LogoWS.ico'?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo($GLOBALS['rooturl'] ). 'assets/img/Logo/LogoWS.png'?>" type="image/png" />
    <link rel="shortcut icon" href="<?php echo($GLOBALS['rooturl'] ). 'assets/img/Logo/LogoWS.png'?>" type="image/png" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="color-scheme" content="normal">
    <meta name="author" content="alexistb2904">
    <meta name="robots" content="index, follow">
    <meta http-equiv="content-language" content="fr-fr">
    <link rel="canonical" href="https://<?php echo($currentURL); ?>" />

    <!-- Base Meta Tags -->
    <meta name="title" content="Accueil - WorkshopRessources">
    <meta name="description"
          content="WorkshopRessources est une plateforme qui propose une variété de ressources utiles aux reskinneurs et développeurs de Garry's Mod.">
    <meta name="keywords"
          content="Accueil,workshop,ressources,steam,download,template,gratuit,free,vehicle,véhicule,voiture,3D,police,secours,pompiers,png,jpeg,jpg,alexistb2904,decals,zebra">

    <!-- Facebook Meta Tags -->
    <meta property="og:title" content="Accueil - WorkshopRessources" />
    <meta property="og:description"
          content="WorkshopRessources est une plateforme qui propose une variété de ressources utiles aux reskinneurs et développeurs de Garry's Mod." />
    <meta property="og:image" content="<?php echo($GLOBALS['rooturl'] ). 'assets/img/Logo/LogoWS.png'?>">
    <meta property="og:url" content="https://<?php echo($currentURL); ?>" />
    <meta property="og:locale" content="fr_FR" />
    <meta property="og:type" content="website">

    <!-- Twitter Meta Tags -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://<?php echo($currentURL); ?>">
    <meta property="twitter:title" content="Accueil - WorkshopRessources">
    <meta property="twitter:description"
          content="WorkshopRessources est une plateforme qui propose une variété de ressources utiles aux reskinneurs et développeurs de Garry's Mod.">
    <meta property="twitter:image" content="<?php echo($GLOBALS['rooturl'] ). 'assets/img/Logo/LogoWS.png'?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo&display=swap" rel="stylesheet">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-408NVZ99VY"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-408NVZ99VY');
    </script>

    <script type="text/javascript">
        (function (c, l, a, r, i, t, y) {
            c[a] = c[a] || function () { (c[a].q = c[a].q || []).push(arguments) };
            t = l.createElement(r); t.async = 1; t.src = "https://www.clarity.ms/tag/" + i;
            y = l.getElementsByTagName(r)[0]; y.parentNode.insertBefore(t, y);
        })(window, document, "clarity", "script", "g3iiq9rlyc");
    </script>

    <script type="application/ld+json">
        {
            "@context": "http://schema.org/",
            "@type": "BreadcrumbList",
            "itemListElement": [
                {
                    "@type": "ListItem",
                    "position": 1,
                    "name": "template",
                    "item": "https://workshopressources.fr/template/start"
                },
                {
                    "@type": "ListItem",
                    "position": 2,
                    "name": "creator",
                    "item": "https://workshopressources.fr/template/start"
                },
                {
                    "@type": "ListItem",
                    "position": 3,
                    "name": "alexcars",
                    "item": "https://workshopressources.fr/template/creator/alexcars"
                }
            ]
        }
    </script>

</head>

<body>

    <!-- Navigation -->
    <?php include_once('header.php'); ?>

    <main>
        <div class="start">
            <div class="start-img">
                <img src="<?php echo($GLOBALS['rooturl'] ). 'assets/img/gmodimage/ImgAccueil/gmodaccueil.webp'?>" alt="Peugeot 208 Gendamerie" width="1366" height="768" loading="lazy">
            </div>
            <div class="start-text">
                <?php if(isset($loggedUser)) : ?>
                    <h1 class="entrytext">Bienvenue sur Workshop Ressources <?php echo($_SESSION['LOGGED_USER_PSEUDO']); ?> ! <br><br></h1>
                <?php else: ?>
                    <h1 class="entrytext">Bienvenue sur Workshop Ressources ! <br><br></h1>
                <?php endif; ?>
                <p>Ce site vous permettra de trouver du
                    contenu qui vous convient, que ce soit des modèles, des décalcomanies ou des motifs zébrés. Nous
                    proposons une grande variété de ressources à votre disposition, et tout cela
                    gratuitement.<br><br>Amusez-vous bien !</p>
            </div>
        </div>
        <section class="section-ressources">
            <h2 class="ressources">Ressources</h2>
            <div class="grid-select">
                <a href="cars/start.php" class="template">
                    <div>
                        <p class="h3card">Template</p>
                    </div>
                </a>
                <a href="misc/zebra.php" class="zebra">
                    <div>
                        <p class="h3card">Zébras</p>
                    </div>
                </a>
                <a href="misc/decals.php" class="decals">
                    <div>
                        <p class="h3card">Decals</p>
                    </div>
                </a>
                <a href="misc/helpreskin.php" class="aide">
                    <div>
                        <p class="h3card">Aide</p>
                    </div>
                </a>
                <a href="" class="vmt_vtf">
                    <div>
                        <p class="h3card">Vmt / Vtf</p>
                    </div>
                </a>
            </div>
        </section>
    </main>
<?php include_once('footer.php'); ?>
</body>
</html>