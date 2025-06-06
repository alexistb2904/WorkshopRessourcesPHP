<?php
const BY_SERVER = true;
include_once 'util/functions.php';
include_once 'util/variables.php';
?>

<!DOCTYPE html>
<html lang="<?= $GLOBALS['lang'] ?>">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description"
		content="Optimisez vos projets avec WorkshopRessource : découvrez nos outils exclusifs, incluant des décals et autres ressources, 100% Open-Source. Accédez à des tutoriels détaillés pour enrichir vos compétences. Élevez la qualité de vos projets grâce à des ressources exceptionnelles.">
	<meta name="keywords" content="workshop, ressources, gratuit, tutoriels, gmod, zébra, decals, template, créateur, jeu, garry's mod, novalife, nova-life">
	<meta name="author" content="Alexis Thierry-Bellefond">
	<meta name="twitter:card" content="summary">
	<meta name="twitter:site" content="@alexistb2904">
	<meta name="twitter:title" content="WorkshopRessources - +100 Ressources pour vous">
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
	<title>WorkshopRessources +100 Ressources pour vous</title>
</head>

<body>
	<header>
		<?php include_once 'components/nav_bar.php' ?>
	</header>
	<main>
		<section class="header-text">
			<div>
				<h1><?= lang("header_page_title") ?></h1>
				<p><?= lang("header_page_description") ?></p>
			</div>
			<a class="glow-button-a" href="#card-ressources">
				<button class="glow-button"><?= lang("header_page_button") ?></button>
			</a>
		</section>
		<?php if (isLogged() === false) { ?>
			<div class="banner-signup-container">
				<div class="banner-signup">
					<p><?= lang("banner_action_call_1") ?></p>
					<a href="login.php?signup">
						<button><?= lang("banner_action_call_1_btn") ?></button>
					</a>
				</div>
			</div>
		<?php } else { ?>
			<div class="banner-signup-container">
				<div class="banner-signup">
					<p><?= lang("banner_action_call_2") ?></p>
					<a href="panel/index.php">
						<button><?= lang("banner_action_call_2_btn") ?></button>
					</a>
				</div>
			</div>
		<?php } ?>
		<section class="game-card">
			<a href="ressources/garrysmod/" class="card-game">
				<img src="../assets/images/gmod.png" alt="Garry's Mod Game Image">
				<h3>Garry's Mod</h3>
			</a>
			<a href="ressources/novalife/templates.php" class="card-game">
				<img src="../assets/images/novalife.jpg" alt="Nova-Life Game Image">
				<h3>Nova Life</h3>
			</a>
		</section>
		<section class="category-card" id="card-ressources">
			<a href="ressources/decals.php" class="card-a">
				<div class="card" id="decals">
					<div class="card-item">
						<h3><?= lang("category_title_1") ?></h3>
						<div class="card-arrow"><i class="fa-solid fa-arrow-right"></i></div>
					</div>
				</div>
			</a>
			<a href="ressources/zebra.php" class="card-a">
				<div class="card" id="zebra">
					<div class="card-item">
						<h3><?= lang("category_title_2") ?></h3>
						<div class="card-arrow"><i class="fa-solid fa-arrow-right"></i></div>
					</div>
				</div>
			</a>
			<!--<a href="templates.php" class="card-a">
				<div class="card" id="template">
					<div class="card-item">
						<h3>Template</h3>
						<div class="card-arrow"><i class="fa-solid fa-arrow-right"></i></div>
					</div>
				</div>
			</a>
			<a href="ressources/aide.php" class="card-a">
				<div class="card" id="aide">
					<div class="card-item">
						<h3>Aide</h3>
						<div class="card-arrow"><i class="fa-solid fa-arrow-right"></i></div>
					</div>
				</div>
			</a>
			<a href="ressources/vmtvtf.php" class="card-a">
				<div class="card" id="vmtvtf">
					<div class="card-item">
						<h3>VMT</h3>
						<div class="card-arrow"><i class="fa-solid fa-arrow-right"></i></div>
					</div>
				</div>
			</a>-->
		</section>
		<section class="new-ressources">
			<h2><?= lang("new_ressources_string") ?></h2>
			<div class="new-ressources-card-container">
				<?php foreach (getItem('novalife_flocage', 1, 2) as $item) { ?>
					<div class="new-ressources-card">
						<?php if (strpos($item['photo'], "http://") === 0 || strpos($item['photo'], "https://") === 0) { ?>
							<img src="<?php echo ($item['photo']) ?>" alt="<?php echo $item['title']; ?>" loading="lazy">
						<?php } else { ?>
							<img src="<?php echo $item['photo']; ?>" alt="<?php echo $item['title']; ?>" loading="lazy">
						<?php } ?>
						<p>
							<?php echo ($item['title']) ?>
						</p>
						<p><?= lang("add_by") ?> :
							<?php echo ($item['creator_name']) ?>
						</p>
						<a href="<?php echo ($item['photo']); ?>" download><?= lang("download_btn") ?></a>
					</div>
				<?php } ?>
				<?php foreach (getItem('zebra_c', 1, 2) as $item) { ?>
					<div class="new-ressources-card">
						<?php if (strpos($item['photo'], "http://") === 0 || strpos($item['photo'], "https://") === 0) { ?>
							<img src="<?php echo ($item['photo']) ?>" alt="<?php echo $item['title']; ?>" loading="lazy">
						<?php } else { ?>
							<img src="<?php echo $item['photo']; ?>" alt="<?php echo $item['title']; ?>" loading="lazy">
						<?php } ?>
						<p>
							<?php echo ($item['title']) ?>
						</p>
						<p><?= lang("add_by") ?> :
							<?php echo ($item['creator_name']) ?>
						</p>
						<a href="<?php echo ($item['photo']); ?>" download><?= lang("download_btn") ?></a>
					</div>
				<?php } ?>
			</div>
		</section>
	</main>
	<?php include_once 'components/footer.php'; ?>
</body>

</html>