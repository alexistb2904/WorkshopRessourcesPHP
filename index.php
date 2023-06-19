<?php session_start(); ?>
<!doctype html>
<html lang="fr">

<head>
    <title>Home - WorkshopRessources</title>
    <!-- Required meta tags -->
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="../../assets/img/Logo/LogoWS.ico">
    <link rel="apple-touch-icon" sizes="114x114" href="../../assets/img/Logo/LogoWS.png" type="image/png" />
    <link rel="shortcut icon" href="../../assets/img/Logo/LogoWS.png" type="image/png" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="color-scheme" content="normal">
    <meta name="author" content="alexistb2904">
    <meta name="robots" content="index, follow">
    <meta http-equiv="content-language" content="fr-fr">
    <link rel="canonical" href="https://workshopressources.fr/template/creator/alexcars" />

    <!-- Base Meta Tags -->
    <meta name="title" content="AlexCars - WorkshopRessources">
    <meta name="description"
          content="Ici découvrez les templates des véhicules de AlexCars (alexistb2904) qui sont disponible sur WorkshopRessources.">
    <meta name="keywords"
          content="AlexCars,workshop,ressources,steam,download,template,gratuit,free,vehicle,véhicule,voiture,3D,police,secours,pompiers,png,jpeg,jpg,alexistb2904">

    <!-- Facebook Meta Tags -->
    <meta property="og:title" content="Templates de AlexCars" />
    <meta property="og:description"
          content="Ici découvrez les templates des véhicules de AlexCars (alexistb2904) qui sont disponible sur WorkshopRessources." />
    <meta property="og:image" content="https://workshopressources.fr/assets/img/Logo/LogoWS.png">
    <meta property="og:url" content="https://workshopressources.fr/template/creator/alexcars" />
    <meta property="og:locale" content="fr_FR" />
    <meta property="og:type" content="website">

    <!-- Twitter Meta Tags -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://workshopressources.fr/template/creator/alexcars">
    <meta property="twitter:title" content="Templates de AlexCars">
    <meta property="twitter:description"
          content="Ici découvrez les templates des véhicules de AlexCars (alexistb2904) qui sont disponible sur WorkshopRessources.">
    <meta property="twitter:image" content="https://workshopressources.fr/assets/img/Logo/LogoWS.png">
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
                <img src="https://workshopressources.fr/assets/img/gmodimage/ImgAccueil/gmodaccueil.webp" alt="Peugeot 208 Gendamerie" width="1366" height="768" loading="lazy">
            </div>
            <div class="start-text">
                <?php if(isset($loggedUser)) : ?>
                    <h1 class="entrytext">Bienvenue sur Workshop Ressources <?php echo($loggedUser['email']); ?> ! <br><br></h1>
                <?php else: ?>
                    <h1 class="entrytext">Bienvenue sur Workshop Ressources ! <br><br></h1>
                <?php endif; ?>
                <p>Ce site vous permettra de trouver du <?php echo($_ENV['MYSQL_DATABASE']); ?>
                    contenu qui vous convient, que ce soit des modèles, des décalcomanies ou des motifs zébrés. Nous
                    proposons une grande variété de ressources à votre disposition, et tout cela
                    gratuitement.<br><br>Amusez-vous bien !</p>
            </div>
        </div>
        <section class="section-ressources">
            <h2 class="ressources">Ressources</h2>
            <div class="grid-select">
                <a href="template/start" class="template">
                    <div>
                        <p class="h3card">Template</p>
                    </div>
                </a>
                <a href="zebra/page" class="zebra">
                    <div>
                        <p class="h3card">Zébras</p>
                    </div>
                </a>
                <a href="decals/page" class="decals">
                    <div>
                        <p class="h3card">Decals</p>
                    </div>
                </a>
                <a href="help/helpreskin" class="aide">
                    <div>
                        <p class="h3card">Aide</p>
                    </div>
                </a>
                <a href="help/vmt.vtf" class="vmt_vtf">
                    <div>
                        <p class="h3card">Vmt / Vtf</p>
                    </div>
                </a>
            </div>
        </section>
    </main>
<?php include_once('footer.php'); ?>
    <script>
        var dropdown = document.getElementsByClassName("btn-dropdown-ws");
        var i;

        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function () {
                this.classList.toggle("active");
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                }
            });
        }
    </script>
</body>
</html>