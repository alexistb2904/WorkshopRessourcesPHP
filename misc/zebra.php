<?php session_start();
include_once ('../functions.php');?>

<?php
$nameExtension = basename(__FILE__);
$name = pathinfo($nameExtension, PATHINFO_FILENAME);
$Cname = ucfirst($name);
$currentURL = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

$rootPath = $_SERVER['DOCUMENT_ROOT'];
$rootUrl = $GLOBALS['rooturl'];

?>

<!doctype html>
<html lang="fr">

<head>
	<title><?php echo($Cname); ?> - WorkshopRessources</title>
	<!-- Required meta tags -->
	<link rel="stylesheet" href="<?php echo($rootUrl). 'style.css'?>">
	<link rel="icon" href="<?php echo($rootUrl). 'assets/img/Logo/LogoWS.ico'?>">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo($rootUrl). 'assets/img/Logo/LogoWS.png'?>" type="image/png" />
	<link rel="shortcut icon" href="<?php echo($rootUrl). 'assets/img/Logo/LogoWS.png'?>" type="image/png" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="color-scheme" content="normal">
	<meta name="author" content="alexistb2904">
	<meta name="robots" content="index, follow">
	<meta http-equiv="content-language" content="fr-fr">
	<link rel="canonical" href="https://<?php echo($currentURL); ?>" />

	<!-- Base Meta Tags -->
	<meta name="title" content="<?php echo($Cname); ?> - WorkshopRessources">
	<meta name="description"
		  content="Ici découvrez les <?php echo($Cname); ?> qui sont disponible sur WorkshopRessources.">
	<meta name="keywords"
		  content="<?php echo($Cname); ?>,workshop,ressources,steam,download,template,gratuit,free,vehicle,véhicule,voiture,3D,police,secours,pompiers,png,jpeg,jpg,alexistb2904,zebra">

	<!-- Facebook Meta Tags -->
	<meta property="og:title" content="<?php echo($Cname); ?>" />
	<meta property="og:description"
		  content="Ici découvrez les <?php echo($Cname); ?> qui sont disponible sur WorkshopRessources." />
	<meta property="og:image" content="<?php echo($rootUrl). 'assets/img/Logo/LogoWS.png'?>">
	<meta property="og:url" content="https://<?php echo($currentURL); ?>" />
	<meta property="og:locale" content="fr_FR" />
	<meta property="og:type" content="website">

	<!-- Twitter Meta Tags -->
	<meta property="twitter:card" content="summary_large_image">
	<meta property="twitter:url" content="https://<?php echo($currentURL); ?>">
	<meta property="twitter:title" content="<?php echo($Cname); ?>">
	<meta property="twitter:description"
		  content="Ici découvrez les <?php echo($Cname); ?> qui sont disponible sur WorkshopRessources.">
	<meta property="twitter:image" content="<?php echo($rootUrl). 'assets/img/Logo/LogoWS.png'?>">
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

</head>

<body style="background-color: rgb(38,49,59);">
<!-- Navigation -->
<?php include_once('../header.php'); ?>

<main class="main-download">
	<div class="title-download">
		<h1><?php echo($Cname); ?></h1>
		<p>Vous trouverez ici les <?php echo($Cname); ?> disponible</p>
		<a class="button-goto" href="#zebra_c">Allez vers Zebra communauté</a>
	</div>
	<div class="grid-download">
        <?php foreach (get_car($$name) as $category_item) : ?>
            <?php if($category_item['is_enabled'] == "1") { ?>
				<div class="grid-download-item">
					<div class="grid-download-item-img">
						<a href="<?php echo($category_item['car_url']); ?>" style="display: inline">
							<img src="../<?php echo($category_item['car_photo']); ?>"
								 alt="<?php echo($category_item['car_title']); ?> <?php echo($Cname); ?>" loading="lazy";>
						</a>
					</div>
					<a href="<?php echo($category_item['car_url']); ?>" target="_blank">
						<p><?php echo($category_item['car_title']); ?></p>
					</a>
					<a class="grid-download-item-a" href="../<?php echo($category_item['car_photo']); ?>" download>Télécharger</a>
				</div>
            <?php } ?>

        <?php endforeach ?>
	</div>
	<div class="title-download" id="zebra_c">
		<h1>Zébra Communauté</h1>
		<p>Vous trouverez ici les Zébra de la communauté disponible</p>
	</div>
	<div class="grid-download">
        <?php foreach (get_car($zebra_c) as $category_item) : ?>
            <?php if($category_item['is_enabled'] == "1") { ?>
				<div class="grid-download-item">
					<div class="grid-download-item-img">
						<a href="<?php echo($category_item['url']); ?>" style="display: inline">
                            <?php if(strpos($category_item['photo'], "http://") === 0 || strpos($category_item['photo'], "https://") === 0) { ?>
								<img src="<?php echo($category_item['photo']) ?>"
									 alt="<?php echo $category_item['title']; ?>" loading="lazy">
                            <?php } else { ?>
								<img src="../<?php echo $category_item['photo']; ?>"
									 alt="<?php echo $category_item['title']; ?>" loading="lazy">
                            <?php } ?>
						</a>
					</div>
					<a href="<?php echo $category_item['url']; ?>" target="_blank">
						<p style="color:white; margin-bottom: 0;"><?php echo $category_item['title']; ?></p>
						<p style="color:gray; margin-top: 0px; font-size: 1vmax">Créateur : <?php echo $category_item['creator_name']; ?></p>
					</a>
                    <?php if(strpos($category_item['photo'], "http://") === 0 || strpos($category_item['photo'], "https://") === 0) { ?>
						<a class="grid-download-item-a" href="<?php echo($category_item['photo']); ?>" download>Télécharger</a>
                    <?php } else { ?>
						<a class="grid-download-item-a" href="../<?php echo($category_item['photo']); ?>" download>Télécharger</a>
                    <?php } ?>
				</div>
            <?php } ?>

        <?php endforeach ?>
	</div>
</main>
<?php include_once('../footer.php'); ?>
</body>
</html> </div>
    </main>
<?php include_once('../footer.php'); ?>
</body>
</html>