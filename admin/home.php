<?php session_start();
include_once('../functions.php');

$nameExtension = basename(__FILE__);
$name = pathinfo($nameExtension, PATHINFO_FILENAME);
$Cname = ucfirst($name);
$currentURL = $GLOBALS['currentURL'];
?>
<!doctype html>
<html lang="fr">
<head>
	<title><?php echo($Cname); ?> - Administrateur</title>
	<!-- Required meta tags -->
	<link rel="stylesheet" href="<?php echo ($GLOBALS['rooturl']) . 'style-admin.css' ?>">
	<link rel="icon" href="<?php echo ($GLOBALS['rooturl']) . 'assets/img/Logo/LogoWS.ico' ?>">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo ($GLOBALS['rooturl']) . 'assets/img/Logo/LogoWS.png' ?>"
		  type="image/png"/>
	<link rel="shortcut icon" href="<?php echo ($GLOBALS['rooturl']) . 'assets/img/Logo/LogoWS.png' ?>" type="image/png"/>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="color-scheme" content="normal">
	<meta name="author" content="alexistb2904">
	<meta name="robots" content="index, follow">
	<meta http-equiv="content-language" content="fr-fr">
	<link rel="canonical" href="https://<?php echo($currentURL); ?>"/>

	<!-- Base Meta Tags -->
	<meta name="title" content="<?php echo($Cname); ?> - WorkshopRessources">
	<meta name="description"
		  content="Panel Administrateur">
	<meta name="keywords"
		  content="<?php echo($Cname); ?>,workshop,ressources,steam,download,template,gratuit,free,vehicle,véhicule,voiture,3D,police,secours,pompiers,png,jpeg,jpg,alexistb2904">


	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-408NVZ99VY"></script>
	<script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'G-408NVZ99VY');
	</script>

	<script type="text/javascript">
        (function (c, l, a, r, i, t, y) {
            c[a] = c[a] || function () {
                (c[a].q = c[a].q || []).push(arguments)
            };
            t = l.createElement(r);
            t.async = 1;
            t.src = "https://www.clarity.ms/tag/" + i;
            y = l.getElementsByTagName(r)[0];
            y.parentNode.insertBefore(t, y);
        })(window, document, "clarity", "script", "g3iiq9rlyc");
	</script>

</head>

<body>

<!-- Navigation -->
<?php include_once('../header.php'); ?>

<!-- Main -->
<?php include_once('../variables.php'); ?>

<?php if (is_admin($loggedUser['email'])) { ?>

    <?php
    $creator_list = [
        'azok30',
        'rytrak',
        'w4nou',
        'itzdannio25',
        'alexcars',
        'sgm',
        'other',
    ];
    ?>

	<main>
        <?php foreach ($creator_list as $variableName) : ?>
			<details>
                <?php $Cname = ucfirst($variableName); ?>
				<summary><?php echo $Cname; ?></summary>
				<div class="grid-download">
                    <?php foreach ($$variableName as $category_item) : ?>
                        <?php if ($variableName == 'other') { ?>
							<div class="grid-download-item">
								<div class="grid-download-item-img">
                                    <?php if (strpos($category_item['photo'], "http://") === 0 || strpos($category_item['photo'], "https://") === 0) { ?>
										<img src="<?php echo($category_item['photo']) ?>"
											 alt="<?php echo $category_item['title']; ?>" loading="lazy">
                                    <?php } else { ?>
										<img src="../<?php echo $category_item['photo']; ?>"
											 alt="<?php echo $category_item['title']; ?>" loading="lazy">
                                    <?php } ?>
								</div>
								<a href="<?php echo $category_item['url']; ?>" target="_blank">
									<p><?php echo $category_item['title']; ?>
										| <?php echo $category_item['is_enabled']; ?></p>
									<p><?php echo $category_item['creator_name']; ?></p>
								</a>
								<a class="link-warning grid-download-item-a"
								   href="car_admin/update.php?id=<?php echo $category_item['id']; ?>&title=<?php echo $category_item['title']; ?>&photo=<?php echo $category_item['photo']; ?>&creator=other&url=<?php echo $category_item['url']; ?>&is_enabled=<?php echo $category_item['is_enabled']; ?>&creator_name=<?php echo $category_item['creator_name']; ?>&workshop_name=<?php echo $category_item['workshop_name']; ?>">Editer</a>
								<a class="link-danger grid-download-item-a"
								   href="car_admin/delete.php?id=<?php echo $category_item['id']; ?>&title=<?php echo $category_item['title']; ?>&photo=<?php echo $category_item['photo']; ?>&creator=other&creator_name=<?php echo $category_item['creator_name']; ?>">Supprimer</a>
							</div>
                        <?php } else { ?>
							<div class="grid-download-item">
								<div class="grid-download-item-img">
                                    <?php if (strpos($category_item['car_photo'], "http://") === 0|| strpos($category_item['car_photo'], "https://") === 0) { ?>
										<img src="<?php echo($category_item['car_photo']) ?>"
											 alt="<?php echo $category_item['car_title']; ?> 1" loading="lazy">
                                    <?php } else { ?>
										<img src="../<?php echo($category_item['car_photo']) ?>"
											 alt="<?php echo $category_item['car_title']; ?> 2" loading="lazy">
                                    <?php } ?>
								</div>
								<a href="<?php echo $category_item['car_url']; ?>" target="_blank">
									<p><?php echo $category_item['car_title']; ?></p>
								</a>
								<a class="link-warning grid-download-item-a"
								   href="car_admin/update.php?id=<?php echo $category_item['car_id']; ?>&car_title=<?php echo $category_item['car_title']; ?>&car_photo=<?php echo $category_item['car_photo']; ?>&creator=<?php echo $variableName; ?>&car_url=<?php echo $category_item['car_url']; ?>">Editer</a>
								<a class="link-danger grid-download-item-a"
								   href="car_admin/delete.php?id=<?php echo $category_item['car_id']; ?>&car_title=<?php echo $category_item['car_title']; ?>&car_photo=<?php echo $category_item['car_photo']; ?>&creator=<?php echo $variableName; ?>">Supprimer</a>
							</div>
                        <?php } ?>
                    <?php endforeach; ?>
					<div class="grid-download-plus">
						<div class="grid-download-item-plus">
							<a href="car_admin/create.php?creator=<?php echo $variableName; ?>">
								<img src="https://cdn-icons-png.flaticon.com/512/226/226974.png"
									 alt="Plus Image" loading="lazy">
							</a>
						</div>
					</div>
				</div>
			</details>
        <?php endforeach; ?>
		<details>
			<summary>Zébra</summary>
			<div class="grid-download">
                <?php foreach ($zebra as $category_item) : ?>
					<div class="grid-download-item">
						<div class="grid-download-item-img">
                            <?php if (strpos($category_item['car_photo'], "http://") === 0 || strpos($category_item['car_photo'], "https://") === 0) { ?>
								<img src="<?php echo($category_item['car_photo']) ?>"
									 alt="<?php echo $category_item['car_title']; ?>" loading="lazy">
                            <?php } else { ?>
								<img src="../<?php echo $category_item['car_photo']; ?>"
									 alt="<?php echo $category_item['car_title']; ?>" loading="lazy">
                            <?php } ?>
						</div>
						<a href="<?php echo $category_item['car_url']; ?>" target="_blank">
							<p><?php echo $category_item['car_title']; ?>
								| <?php echo $category_item['is_enabled']; ?></p>
						</a>
						<a class="link-warning grid-download-item-a"
						   href="car_admin/update.php?id=<?php echo $category_item['car_id']; ?>&car_title=<?php echo $category_item['car_title']; ?>&car_photo=<?php echo $category_item['car_photo']; ?>&creator=zebra&car_url=<?php echo $category_item['car_url']; ?>&is_enabled=<?php echo $category_item['is_enabled']; ?>">Editer</a>
						<a class="link-danger grid-download-item-a"
						   href="car_admin/delete.php?id=<?php echo $category_item['car_id']; ?>&car_title=<?php echo $category_item['car_title']; ?>&car_photo=<?php echo $category_item['car_photo']; ?>&creator=zebra">Supprimer</a>
					</div>
                <?php endforeach; ?>
				<div class="grid-download-plus">
					<div class="grid-download-item-plus">
						<a href="car_admin/create.php?creator=zebra">
							<img src="https://cdn-icons-png.flaticon.com/512/226/226974.png"
								 alt="Plus Image" loading="lazy">
						</a>
					</div>
				</div>
			</div>
		</details>
		<details>
			<summary>Decals</summary>
			<div class="grid-download">
                <?php foreach ($decals as $category_item) : ?>
					<div class="grid-download-item">
						<div class="grid-download-item-img">
                            <?php if (strpos($category_item['car_photo'], "http://") === 0 || strpos($category_item['car_photo'], "https://") === 0) { ?>
								<img src="<?php echo($category_item['car_photo']) ?>"
									 alt="<?php echo $category_item['car_title']; ?>" loading="lazy">
                            <?php } else { ?>
								<img src="../<?php echo $category_item['car_photo']; ?>"
									 alt="<?php echo $category_item['car_title']; ?>" loading="lazy">
                            <?php } ?>
						</div>
						<a href="<?php echo $category_item['car_url']; ?>" target="_blank">
							<p><?php echo $category_item['car_title']; ?>
								| <?php echo $category_item['is_enabled']; ?></p>
						</a>
						<a class="link-warning grid-download-item-a"
						   href="car_admin/update.php?id=<?php echo $category_item['car_id']; ?>&title=<?php echo $category_item['car_title']; ?>&photo=<?php echo $category_item['car_photo']; ?>&creator=decals&url=<?php echo $category_item['car_url']; ?>&is_enabled=<?php echo $category_item['is_enabled']; ?>">Editer</a>
						<a class="link-danger grid-download-item-a"
						   href="car_admin/delete.php?id=<?php echo $category_item['car_id']; ?>&title=<?php echo $category_item['car_title']; ?>&photo=<?php echo $category_item['car_photo']; ?>&creator=decals">Supprimer</a>
					</div>
                <?php endforeach; ?>
				<div class="grid-download-plus">
					<div class="grid-download-item-plus">
						<a href="car_admin/create.php?creator=decals">
							<img src="https://cdn-icons-png.flaticon.com/512/226/226974.png"
								 alt="Plus Image" loading="lazy">
						</a>
					</div>
				</div>
			</div>
		</details>

		<details>
			<summary>Decals Communauté</summary>
			<div class="grid-download">
                <?php foreach ($decals_c as $category_item) : ?>
					<div class="grid-download-item">
						<div class="grid-download-item-img">
                            <?php if (strpos($category_item['photo'], "http://") === 0 || strpos($category_item['photo'], "https://") === 0) { ?>
								<img src="<?php echo($category_item['photo']) ?>"
									 alt="<?php echo $category_item['title']; ?>" loading="lazy">
                            <?php } else { ?>
								<img src="../<?php echo $category_item['photo']; ?>"
									 alt="<?php echo $category_item['title']; ?>" loading="lazy">
                            <?php } ?>
						</div>
						<a href="<?php echo $category_item['url']; ?>" target="_blank">
							<p><?php echo $category_item['title']; ?>
								| <?php echo $category_item['is_enabled']; ?></p>
							<p>Créateur : <?php echo $category_item['creator_name']; ?></p>
						</a>
						<a class="link-warning grid-download-item-a"
						   href="car_admin/update.php?id=<?php echo $category_item['id']; ?>&title=<?php echo $category_item['title']; ?>&photo=<?php echo $category_item['photo']; ?>&creator=decals_c&url=<?php echo $category_item['url']; ?>&is_enabled=<?php echo $category_item['is_enabled']; ?>&creator_name=<?php echo $category_item['creator_name']; ?>">Editer</a>
						<a class="link-danger grid-download-item-a"
						   href="car_admin/delete.php?id=<?php echo $category_item['id']; ?>&title=<?php echo $category_item['title']; ?>&photo=<?php echo $category_item['photo']; ?>&creator=decals_c&creator_name=<?php echo $category_item['creator_name']; ?>">Supprimer</a>
					</div>
                <?php endforeach; ?>
				<div class="grid-download-plus">
					<div class="grid-download-item-plus">
						<a href="car_admin/create.php?creator=decals">
							<img src="https://cdn-icons-png.flaticon.com/512/226/226974.png"
								 alt="Plus Image" loading="lazy">
						</a>
					</div>
				</div>
			</div>
		</details>
		<details>
			<summary>Zébra Communauté</summary>
			<div class="grid-download">
                <?php foreach ($zebra_c as $category_item) : ?>
					<div class="grid-download-item">
						<div class="grid-download-item-img">
                            <?php if (strpos($category_item['photo'], "http://") === 0 || strpos($category_item['photo'], "https://") === 0) { ?>
								<img src="<?php echo($category_item['photo']) ?>"
									 alt="<?php echo $category_item['title']; ?>" loading="lazy">
                            <?php } else { ?>
								<img src="../<?php echo $category_item['photo']; ?>"
									 alt="<?php echo $category_item['title']; ?>" loading="lazy">
                            <?php } ?>
						</div>
						<a href="<?php echo $category_item['url']; ?>" target="_blank">
							<p><?php echo $category_item['title']; ?>
								| <?php echo $category_item['is_enabled']; ?></p>
							<p><?php echo $category_item['creator_name']; ?></p>
						</a>
						<a class="link-warning grid-download-item-a"
						   href="car_admin/update.php?id=<?php echo $category_item['id']; ?>&title=<?php echo $category_item['title']; ?>&photo=<?php echo $category_item['photo']; ?>&creator=zebra_c&url=<?php echo $category_item['url']; ?>&is_enabled=<?php echo $category_item['is_enabled']; ?>&creator_name=<?php echo $category_item['creator_name']; ?>">Editer</a>
						<a class="link-danger grid-download-item-a"
						   href="car_admin/delete.php?id=<?php echo $category_item['id']; ?>&title=<?php echo $category_item['title']; ?>&photo=<?php echo $category_item['photo']; ?>&creator=zebra_c&creator_name=<?php echo $category_item['creator_name']; ?>">Supprimer</a>
					</div>
                <?php endforeach; ?>
				<div class="grid-download-plus">
					<div class="grid-download-item-plus">
						<a href="car_admin/create.php?creator=zebra">
							<img src="https://cdn-icons-png.flaticon.com/512/226/226974.png"
								 alt="Plus Image" loading="lazy">
						</a>
					</div>
				</div>
			</div>
		</details>
		<a class="nav-link" href="<?php echo ($GLOBALS['rooturl']) . 'user/home.php'; ?>" style='text-decoration: none; color: white; font-family: "Roboto", sans-serif; text-align: center; font-size: 2rem;'><p style="padding: 0.5rem; margin: 0 20vw 2vmax 20vw;">Panel User</p></a>
	</main>
<?php } else { ?>

	<h1 style="color: white; margin-bottom: 20vmax; margin-top: 20vmax">Vous n'avez pas les droits pour accéder à cette
		page.</h1>

<?php } ?>

<?php include_once('../footer.php'); ?>
</body>
</html>