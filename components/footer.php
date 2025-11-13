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
				<li><a href="https://discord.gg/4BZEB27feA"><?= lang("fivemserver") ?></a></li>
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
<div class="card-banner-container">
	
	<div class="card-banner">
		<div class="close">❌</div>
		<div class="card-pattern-grid"></div>
		<div class="card-overlay-dots"></div>

		<div class="bold-pattern">
			<svg viewBox="0 0 100 100">
			<path
				stroke-dasharray="15 10"
				stroke-width="10"
				stroke="#000"
				fill="none"
				d="M0,0 L100,0 L100,100 L0,100 Z"
			></path>
			</svg>
		</div>

		<div class="card-title-area">
			<span>Donner votre Avis</span>
			<span class="card-tag">Avis</span>
		</div>

		<div class="card-body">
			
			<div class="card-description">
			Donnez votre avis sur WorkshopRessources et aidez-nous à améliorer notre plateforme pour mieux répondre à vos besoins !

			</div>

			<!--<div class="feature-grid">
			<div class="feature-item">
				<div class="feature-icon">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-plus-icon lucide-map-plus"><path d="m11 19-1.106-.552a2 2 0 0 0-1.788 0l-3.659 1.83A1 1 0 0 1 3 19.381V6.618a1 1 0 0 1 .553-.894l4.553-2.277a2 2 0 0 1 1.788 0l4.212 2.106a2 2 0 0 0 1.788 0l3.659-1.83A1 1 0 0 1 21 4.619V12"/><path d="M15 5.764V12"/><path d="M18 15v6"/><path d="M21 18h-6"/><path d="M9 3.236v15"/></svg>
				</div>
				<span class="feature-text">Map Custom</span>
			</div>

			<div class="feature-item">
				<div class="feature-icon">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-json-icon lucide-file-json"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 12a1 1 0 0 0-1 1v1a1 1 0 0 1-1 1 1 1 0 0 1 1 1v1a1 1 0 0 0 1 1"/><path d="M14 18a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1 1 1 0 0 1-1-1v-1a1 1 0 0 0-1-1"/></svg>
				</div>
				<span class="feature-text">Développement Constant</span>
			</div>

			<div class="feature-item">
				<div class="feature-icon">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g data-name="Layer 2"><g data-name="flag"><polyline points="24 24 0 24 0 0" opacity="0"/><path d="M19.27 4.68a1.79 1.79 0 0 0-1.6-.25 7.53 7.53 0 0 1-2.17.28 8.54 8.54 0 0 1-3.13-.78A10.15 10.15 0 0 0 8.5 3c-2.89 0-4 1-4.2 1.14a1 1 0 0 0-.3.72V20a1 1 0 0 0 2 0v-4.3a6.28 6.28 0 0 1 2.5-.41 8.54 8.54 0 0 1 3.13.78 10.15 10.15 0 0 0 3.87.93 7.66 7.66 0 0 0 3.5-.7 1.74 1.74 0 0 0 1-1.55V6.11a1.77 1.77 0 0 0-.73-1.43zM18 14.59a6.32 6.32 0 0 1-2.5.41 8.36 8.36 0 0 1-3.13-.79 10.34 10.34 0 0 0-3.87-.92 9.51 9.51 0 0 0-2.5.29V5.42A6.13 6.13 0 0 1 8.5 5a8.36 8.36 0 0 1 3.13.79 10.34 10.34 0 0 0 3.87.92 9.41 9.41 0 0 0 2.5-.3z"/></g></g></svg>
				</div>
				<span class="feature-text">RP Français</span>
			</div>

			<div class="feature-item">
				<div class="feature-icon">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-package-plus-icon lucide-package-plus"><path d="M16 16h6"/><path d="M19 13v6"/><path d="M21 10V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l2-1.14"/><path d="m7.5 4.27 9 5.15"/><polyline points="3.29 7 12 12 20.71 7"/><line x1="12" x2="12" y1="22" y2="12"/></svg>
				</div>
				<span class="feature-text">Script Sur-mesure</span>
			</div>
			</div>--->

			<div class="card-actions">
			<div class="price">
				<span class="price-currency"></span>
				<span class="price-period"></span>
			</div>

			<button class="card-button">Répondre à l’enquête</button>
			</div>
		</div>

		<div class="dots-pattern">
			<svg viewBox="0 0 80 40">
			<circle fill="#000" r="3" cy="10" cx="10"></circle>
			<circle fill="#000" r="3" cy="10" cx="30"></circle>
			<circle fill="#000" r="3" cy="10" cx="50"></circle>
			<circle fill="#000" r="3" cy="10" cx="70"></circle>
			<circle fill="#000" r="3" cy="20" cx="20"></circle>
			<circle fill="#000" r="3" cy="20" cx="40"></circle>
			<circle fill="#000" r="3" cy="20" cx="60"></circle>
			<circle fill="#000" r="3" cy="30" cx="10"></circle>
			<circle fill="#000" r="3" cy="30" cx="30"></circle>
			<circle fill="#000" r="3" cy="30" cx="50"></circle>
			<circle fill="#000" r="3" cy="30" cx="70"></circle>
			</svg>
		</div>

		<div class="accent-shape"></div>
		<div class="corner-slice"></div>

		<div class="stamp">
			<span class="stamp-text">+1000 Visites</span>
		</div>
	</div>
</div>
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

	
	document.addEventListener("DOMContentLoaded", () => {
		const bannerFivem = document.querySelector(".card-banner-container");
		const bannerFivemClose = document.querySelector(".close");
		const lastClose = localStorage.getItem("lastCloseFivemBanner");
		const currentTime = new Date().getTime();
		const button = document.querySelector(".card-button");

		if (lastClose && currentTime - lastClose < 10 * 60 * 60 * 1000) { // Fermer il y a moins de 2 heures
			bannerFivem.style.display = "none";
		} else {
			bannerFivem.style.display = "block";
		}

		bannerFivemClose.addEventListener("click", () => {
			bannerFivem.style.display = "none";
			localStorage.setItem("lastCloseFivemBanner", currentTime);
		});

		button.addEventListener("click", () => {
			window.location.href = "https://docs.google.com/forms/d/e/1FAIpQLScPVHb0oyNQ4fXpC-jCjoJSaFBaJTcDr6Aat1ga-2QvNdvOnQ/viewform?usp=sf_link";
		});
	});
</script>
