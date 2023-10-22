<?php
const BY_SERVER = true;
include_once '../../util/functions.php';
include_once '../../util/variables.php';
$mysqlClient = $GLOBALS['mysqlClientPDO'];
$rootUrl = $GLOBALS['rootUrl'];
$postData = $_POST;
startSession();
if (isset($postData['send'])) {
	if (isLogged() && isAdmin($_SESSION['email'])) {
		if (isset($postData['category']) && isset($postData['title']) && isset($postData['photo']) && isset($postData['url'])) {
			if ($postData['category'] == 'other' || $postData['category'] == 'zebra_c' || $postData['category'] == 'decals_c') {
				if (isset($postData['workshop_name']) && isset($postData['creator_name']) && isset($postData['is_enabled'])) {
					$addContent = "UPDATE `" . $postData['category'] . "` SET `title` = :title, `photo` = :photo, `workshop_name` = :workshop_name, `url` = :url, `creator_name` = :creator_name, `is_enabled` = :is_enabled WHERE `id` = :id;";
					$resultStatement = $mysqlClient->prepare($addContent);
					$title = htmlspecialchars($postData['title']);
					$photo = htmlspecialchars($postData['photo']);
					$url = htmlspecialchars($postData['url']);
					$is_enabled = htmlspecialchars($postData['is_enabled']);
					$workshop_name = htmlspecialchars($postData['workshop_name']);
					$id = htmlspecialchars($_GET['id']);
					$creator_name = htmlspecialchars($postData['creator_name']);

					$resultStatement->bindParam(':title', $title);
					$resultStatement->bindParam(':photo', $photo);
					$resultStatement->bindParam(':url', $url);
					$resultStatement->bindParam(':is_enabled', $is_enabled);
					$resultStatement->bindParam(':workshop_name', $workshop_name);
					$resultStatement->bindParam(':id', $id);
					$resultStatement->bindParam(':creator_name', $creator_name);
					$resultStatement->execute();
					$resultStatement->closeCursor();
					$updated = true;
				} else {
					$errorMessage = 'Il manque des informations pour pouvoir mettre à jour une ressource. ERROR1';
				}
			} else {
				$addContent = "UPDATE `" . $postData['category'] . "` SET `title` = :title, `photo` = :photo, `url` = :url WHERE `id` = :id";
				$resultStatement = $mysqlClient->prepare($addContent);
				$title = htmlspecialchars($postData['title']);
				$photo = htmlspecialchars($postData['photo']);
				$url = htmlspecialchars($postData['url']);
				$id = htmlspecialchars($_GET['id']);
				$resultStatement->bindParam(':title', $title);
				$resultStatement->bindParam(':photo', $photo);
				$resultStatement->bindParam(':url', $url);
				$resultStatement->bindParam(':id', $id);
				$resultStatement->execute();
				$resultStatement->closeCursor();
				$updated = true;
			}
		}
	} else {
		$errorMessage = 'Il faut être connecté et avoir les permissions pour pouvoir mettre à jour une ressource. ERROR2';
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
	<meta name="twitter:title" content="WorkshopRessources - Modification">
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
	<title>WorkshopRessources - Modification</title>
</head>

<body>
	<header>
		<?php include_once '../../components/nav_bar.php' ?>
	</header>
	<main>
		<?php if (!isLogged() || !isAdmin($_SESSION['email'])) { ?>
			<section class="header-text">
				<div>
					<h1>Oups..</h1>
					<p>Tu dois être connecté et avoir la permission pour accéder à cette page</p>
				</div>
				<a class="glow-button-a" href="<?php echo ($GLOBALS['rootUrl']) ?>login.php">
					<button class="glow-button">ME CONNECTER</button>
				</a>
			</section>
		<?php } else { ?>
			<?php if (!isset($updated) || $updated !== true) { ?>
				<?php if (isset($_GET['category']) && isset($_GET['id'])) { ?>
					<?php $items = getById($_GET['id'], $_GET['category']); ?>
					<?php if (!empty($items)) { ?>
						<?php foreach ($items as $item) { ?>
							<section class="category-container">
								<form action="" method="post">
									<h1>Modification de contenu | ADMIN</h1>
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
											value="<?php echo ($item['title']) ?>" placeholder="Titre du contenu" autocomplete="off"
											required>
									</div>
									<div class="part-form">
										<label for="url" class="form-label">Lien vers le contenu*</label>
										<input type="text" class="form-control" id="url" name="url"
											placeholder="Lien Direct vers le contenu" value="<?php echo ($item['url']) ?>"
											autocomplete="off" maxlength="512">
									</div>
									<div class="part-form">
										<label for="photo" class="form-label">Lien vers l'image*</label>
										<input type="text" class="form-control" id="photo" name="photo"
											placeholder="Lien Direct vers l'image" autocomplete="off" value="<?php echo ($item['photo']) ?>"
											maxlength="512" required>
									</div>
									<?php if (($_GET['category'] === 'zebra_c' || $_GET['category'] === 'decals_c' || $_GET['category'] === 'other')) { ?>
										<div class="part-form">
											<label for="creator_name" class="form-label">Nom de l'uploader</label>
											<input type="text" class="form-control" id="creator_name" name="creator_name"
												placeholder="Nom de l'uploader" value="<?php echo ($item['creator_name']) ?>" autocomplete="off"
												maxlength="512" required>
										</div>
										<div class="part-form">
											<label for="workshop_name" class="form-label">Nom du créateur originel</label>
											<input type="text" class="form-control" id="workshop_name" name="workshop_name"
												placeholder="Nom du créateur originel" value="<?php echo ($item['workshop_name']) ?>"
												autocomplete="off" required>
										</div>
										<div class="part-form">
											<label for="is_enabled" class="form-label">Status de la création</label>
											<input type="text" class="form-control" id="is_enabled" name="is_enabled" placeholder="Status"
												value="<?php echo ($item['is_enabled']) ?>" autocomplete="off" required>
										</div>
									<?php } ?>
									<label hidden>
										<input type="text" name="send" value="send" hidden>
										<input type="text" name="category" value="<?php echo ($_GET['category']) ?>" hidden>
									</label>
									<button type="submit">Envoyer</button>
								</form>
							</section>
						<?php } ?>
					<?php } else { ?>
						<section class="header-text">
							<div>
								<h1>Oups..</h1>
								<p>L'ID que tu nous as fournis n'est pas reconnu</p>
							</div>
							<a class="glow-button-a" href="<?php echo ($GLOBALS['rootUrl']) ?>panel/admin/index.php">
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
						<a class="glow-button-a" href="<?php echo ($GLOBALS['rootUrl']) ?>panel/admin/index.php">
							<button class="glow-button">PANEL</button>
						</a>
					</section>
				<?php } ?>

			<?php } else { ?>
				<section class="header-text">
					<div>
						<h1>Bravo !</h1>
						<p>Ton contenu a bien été mis à jour, il va bientôt être examiné par notre équipe.</p>
					</div>
					<a class="glow-button-a" href="<?php echo ($GLOBALS['rootUrl']) ?>panel/admin/index.php">
						<button class="glow-button">PANEL</button>
					</a>
				</section>
			<?php } ?>
		<?php } ?>
	</main>
	<?php include_once '../../components/footer.php'; ?>
</body>

</html>