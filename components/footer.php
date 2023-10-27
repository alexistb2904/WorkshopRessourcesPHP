<?php
if (!defined('BY_SERVER')) {
	header("Location: 404.php");
	die();
}
?>
<link rel="stylesheet" href="<?php echo ($GLOBALS['rootUrl']) ?>css/footer.css">

<footer>
	<div class="footer-container">
		<div class="footer_1">
			<div>
				<img src="<?php echo ($GLOBALS['rootUrl']) ?>assets/images/logo.webp"
					alt="Logo de WorkshopRessources" />
				<h1>Workshop Ressources</h1>
			</div>
			<p>Workshop Ressources est une plateforme qui propose une variété de ressources utiles aux reskinneurs et
				développeurs de divers jeux.
				Workshop Ressources is not affiliated with Facepunch Studios Ltd.</p>
		</div>
		<div class="footer_2">
			<h2>Liens utiles</h2>
			<ul>
				<li><a href="">Discord</a></li>
				<li><a href="">Youtube</a></li>
				<li><a href="<?php echo ($GLOBALS['rootUrl']) ?>history.php">Histoire</a></li>
				<li><a href="<?php echo ($GLOBALS['rootUrl']) ?>mentions-legale.php">Mentions Légales</a></li>
			</ul>
		</div>
		<div class="footer_3">
			<h2>Partenaires</h2>
			<a href="">
				<img src="<?php echo ($GLOBALS['rootUrl']) ?>assets/images/iFive.webp" alt="Logo de iFive">
			</a>
		</div>
	</div>
	<hr>
	<div class="footer_4">
		<p>© 2023 Workshop Ressources. Tous droits réservés.</p>
		<a id="bmc" href="https://buymeacoffee.com/alexistb2904"><img
				src="<?php echo ($GLOBALS['rootUrl']) ?>assets/images/bmc.svg" alt="BuyMeACoffeLogo"></a>
	</div>
</footer>