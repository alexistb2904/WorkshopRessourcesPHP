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
				<img src="<?php echo ($GLOBALS['rootUrl']) ?>assets/images/logo.webp" alt="Logo de WorkshopRessources" />
				<h1>Workshop Ressources</h1>
			</div>
			<p><?= lang("footer_description") ?></p>
		</div>
		<div class="footer_2">
			<h2><?= lang("footer_links") ?></h2>
			<ul>
				<li><a href="https://discord.gg/8AqYqrGxUQ">Discord</a></li>
				<li><a href="<?php echo ($GLOBALS['rootUrl']) ?>history.php"><?= lang("footer_history") ?></a></li>
				<li><a href="<?php echo ($GLOBALS['rootUrl']) ?>mentions-legale.php"><?= lang("footer_legals") ?></a></li>
			</ul>
		</div>
		<div class="footer_3">
			<h2><?= lang("footer_partners") ?></h2>
			<a href="">
				<img src="<?php echo ($GLOBALS['rootUrl']) ?>assets/images/iFive.webp" alt="Logo de iFive">
			</a>
		</div>
	</div>
	<hr>
	<div class="footer_4">
		<p>© 2024 Workshop Ressources. <?= lang("footer_all_rights_reserved") ?>.</p>
		<a id="bmc" href="https://buymeacoffee.com/alexistb2904"><img src="<?php echo ($GLOBALS['rootUrl']) ?>assets/images/bmc.svg" alt="BuyMeACoffeLogo"></a>
		<a href="https://www.producthunt.com/posts/workshop-ressources?utm_source=badge-featured&utm_medium=badge&utm_souce=badge-workshop&#0045;ressources" target="_blank"><img
				src="https://api.producthunt.com/widgets/embed-image/v1/featured.svg?post_id=459382&theme=dark"
				alt="Workshop&#0032;Ressources - Ressources&#0032;to&#0032;help&#0032;content&#0032;maker&#0032;on&#0032;Garry&#0039;s&#0032;Mod&#0032;and&#0032;NovaLife | Product Hunt"
				style="width: 250px; height: 54px;" width="250" height="54" /></a>
	</div>
</footer>
<!-- Cookie Consent Banner Configuration -->
<script>
	/* Update available Cookie Categories */
	const cookieConsentBannerElement = document.querySelector(
		"cookie-consent-banner",
	);
	cookieConsentBannerElement.availableCategories = [{
			description: "Vous permettent de naviguer et d'utiliser les fonctions de base, ainsi que de mémoriser vos préférences.",
			key: "technically_required",
			label: "Cookies strictement nécessaires",
			isMandatory: true,
		},
		{
			description: "Nous permettent de savoir comment les visiteurs interagissent avec notre service afin d'améliorer l'expérience utilisateur.",
			key: "analytics",
			label: "Cookies d'analyse",
		},
		{
			description: "Nous permettent de proposer et d'évaluer des contenus pertinents et de la publicité ciblée selon les centres d'intérêt.",
			key: "marketing",
			label: "Cookies marketing",
		},
	];


	/* Init Tag Manager */
	function loadTagManager() {
		if (typeof google_tag_manager !== "undefined") return; // load only once
		console.log("Loading Google Tag Manager");
		const gTags = function(w, d, s, l, i) {
			w[l] = w[l] || [];
			w[l].push({
				"gtm.start": new Date().getTime(),
				event: "gtm.js",
			});
			let f = d.getElementsByTagName(s)[0],
				j = d.createElement(s),
				dl = l != "dataLayer" ? "&l=" + l : "";
			j.async = true;
			j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
			f.parentNode.insertBefore(j, f);
		};

		gTags(window, document, "script", "dataLayer", "GTM-TCNWZRTX");
	}
	window.addEventListener(
		"cookie_consent_preferences_restored",
		loadTagManager,
	);
	window.addEventListener("cookie_consent_preferences_updated", loadTagManager);

	const LANGUAGE_CHOOSE = "<?= $GLOBALS['lang'] ?>";
	let LANGUAGE_FILE = '';
	fetch(`${window.location.origin}/assets/lang/${LANGUAGE_CHOOSE}.json`)
		.then(response => response.json())
		.then(data => {
			LANGUAGE_FILE = data;
		});
</script>