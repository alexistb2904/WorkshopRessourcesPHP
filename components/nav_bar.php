<?php
if (!defined('BY_SERVER')) {
    header("Location: 404.php");
    die();
}

startSession();
?>

<script
    type="module"
    src="https://unpkg.com/@porscheofficial/cookie-consent-banner@1.0.0/dist/cookie-consent-banner/cookie-consent-banner.esm.js"></script>

<!-- Cookie Consent Banner -->
<cookie-consent-banner
    btn-label-accept-and-continue="Accepter et continuer"
    btn-label-only-essential-and-continue="Continuer avec uniquement les cookies nécessaires"
    btn-label-persist-selection-and-continue="Enregistrer la sélection et continuer"
    btn-label-select-all-and-continue="Tout sélectionner et continuer"
    content-settings-description="Vous pouvez décider des cookies à utiliser en sélectionnant les options ci-dessous. Veuillez noter que votre choix peut affecter le bon fonctionnement du service.">
    Nous utilisons des cookies et des technologies similaires pour activer certaines fonctionnalités, améliorer l'expérience utilisateur et diffuser du contenu pertinent selon vos centres d'intérêt. Selon leur finalité, des cookies d'analyse et de marketing peuvent être utilisés en plus des cookies strictement nécessaires. En cliquant sur « Accepter et continuer », vous consentez à l'utilisation des cookies mentionnés ci-dessus.
    <a
        href="javascript:document.dispatchEvent(new Event('cookie_consent_details_show'))">
        Cliquez ici
    </a>
    pour accéder aux paramètres détaillés ou retirer votre consentement (en partie si nécessaire) avec effet pour l’avenir. Pour plus d’informations, veuillez consulter notre
    <a href="{$WebSiteURL}cgu">Politique de confidentialité</a>
    .
</cookie-consent-banner>

<link rel="stylesheet" href="<?php echo ($GLOBALS['rootUrl']) ?>css/nav_bar.css">
<script src="<?php echo ($GLOBALS['rootUrl']) ?>js/nav_bar.js"></script>
<nav>
    <div class="burger-menu">
        <div id="logo-nav">
            <a href=""><img src="<?php echo ($GLOBALS['rootUrl']) ?>assets/images/logo.webp" alt="Logo de WorkshopRessources" /></a>
            <p>WorkshopRessources</p>
        </div>
        <div class="nav-burger">
            <div class="burger-icon" onclick="BurgerMenu()">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
        </div>
    </div>
    <div id="middle-nav">
        <ul id="list-nav">
            <li><a href="<?php echo ($GLOBALS['rootUrl']) ?>index.php"><?= lang("nav_home") ?></a></li>
            <li><a href="<?php echo ($GLOBALS['rootUrl']) ?>ressources/decals.php"><?= lang("category_title_1") ?></a></li>
            <li><a href="<?php echo ($GLOBALS['rootUrl']) ?>ressources/zebra.php"><?= lang("category_title_2") ?></a></li>
            <li><a href="<?php echo ($GLOBALS['rootUrl']) ?>aide.php"><?= lang("category_title_3") ?></a></li>
            <li><a href="<?php echo ($GLOBALS['rootUrl']) ?>templates.php"><?= lang("category_title_4") ?></a></li>
            <li><a href="<?php echo ($GLOBALS['rootUrl']) ?>ressources/novalife/flocages.php"><?= lang("category_title_5") ?></a></li>
        </ul>
        <ul class="list-nav-mobile">
            <li><a href="<?php echo ($GLOBALS['rootUrl']) ?>index.php"><?= lang("nav_home") ?></a></li>
            <li><a href="<?php echo ($GLOBALS['rootUrl']) ?>ressources/decals.php"><?= lang("category_title_1") ?></a></li>
            <li><a href="<?php echo ($GLOBALS['rootUrl']) ?>ressources/zebra.php"><?= lang("category_title_2") ?></a></li>
            <li><a href="<?php echo ($GLOBALS['rootUrl']) ?>aide.php"><?= lang("category_title_3") ?></a></li>
            <li><a href="<?php echo ($GLOBALS['rootUrl']) ?>templates.php"><?= lang("category_title_4") ?></a></li>
            <li><a href="<?php echo ($GLOBALS['rootUrl']) ?>ressources/novalife/flocages.php"><?= lang("category_title_5") ?></a></li>
            <?php if (isLogged() === false) { ?>
                <li><a href="<?php echo ($GLOBALS['rootUrl']) ?>login.php?login" class="button-login"><button><?= lang("login_string") ?></button></a></li>
                <li><a href="<?php echo ($GLOBALS['rootUrl']) ?>login.php?signup" class="button-signup"><button><?= lang("register_string") ?></button></a></li>
            <?php } else { ?>
                <li><a href="<?php echo ($GLOBALS['rootUrl']) ?>panel/index.php" class="button-login"><button><?= lang("nav_panel") ?></button></a></li>
                <li><a href="<?php echo ($GLOBALS['rootUrl']) ?>logout.php" class="button-signup"><button><?= lang("logout_string") ?></button></a></li>
            <?php } ?>
        </ul>
    </div>
    <div id="list-nav-button-login">
        <?php if (isLogged() === false) { ?>
            <a href="<?php echo ($GLOBALS['rootUrl']) ?>login.php?login" class="button-login"><button><?= lang("login_string") ?></button></a>
            <a href="<?php echo ($GLOBALS['rootUrl']) ?>login.php?signup" class="button-signup"><button><?= lang("register_string") ?></button></a>
        <?php } else { ?>
            <a href="<?php echo ($GLOBALS['rootUrl']) ?>panel/index.php" class="button-login"><button><?= lang("nav_panel") ?></button></a>
            <a href="<?php echo ($GLOBALS['rootUrl']) ?>logout.php" class="button-signup"><button><?= lang("logout_string") ?></button></a>
        <?php } ?>
    </div>
</nav>