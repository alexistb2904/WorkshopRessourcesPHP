<?php
if (!defined('BY_SERVER')) {
    header("Location: 404.php");
    die();
}

startSession();
?>

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