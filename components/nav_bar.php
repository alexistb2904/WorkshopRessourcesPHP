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
            <a href=""><img src="<?php echo ($GLOBALS['rootUrl']) ?>assets/images/logo.webp"
                    alt="Logo de WorkshopRessources" /></a>
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
            <li><a href="<?php echo ($GLOBALS['rootUrl']) ?>index.php">Accueil</a></li>
            <li><a href="<?php echo ($GLOBALS['rootUrl']) ?>ressources/decals.php">Decals</a></li>
            <li><a href="<?php echo ($GLOBALS['rootUrl']) ?>ressources/zebra.php">Zébras</a></li>
            <li><a href="<?php echo ($GLOBALS['rootUrl']) ?>aide.php">Aide</a></li>
            <li><a href="<?php echo ($GLOBALS['rootUrl']) ?>templates.php">Template</a></li>
            <li><a href="<?php echo ($GLOBALS['rootUrl']) ?>ressources/novalife/flocages.php">Flocages</a></li>
        </ul>
        <ul class="list-nav-mobile">
            <li><a href="<?php echo ($GLOBALS['rootUrl']) ?>index.php">Accueil</a></li>
            <li><a href="<?php echo ($GLOBALS['rootUrl']) ?>ressources/decals.php">Decals</a></li>
            <li><a href="<?php echo ($GLOBALS['rootUrl']) ?>ressources/zebra.php">Zébras</a></li>
            <li><a href="<?php echo ($GLOBALS['rootUrl']) ?>aide.php">Aide</a></li>

            <li><a href="<?php echo ($GLOBALS['rootUrl']) ?>templates.php">Templates</a></li>
            <li><a href="<?php echo ($GLOBALS['rootUrl']) ?>ressources/novalife/flocages.php">Flocages</a></li>
            <?php if (isLogged() === false) { ?>
                <li><a href="<?php echo ($GLOBALS['rootUrl']) ?>login.php?login" class="button-login"><button>Se
                            connecter</button></a></li>
                <li><a href="<?php echo ($GLOBALS['rootUrl']) ?>login.php?signup"
                        class="button-signup"><button>S'inscrire</button></a></li>
            <?php } else { ?>
                <li><a href="<?php echo ($GLOBALS['rootUrl']) ?>panel/index.php"
                        class="button-login"><button>Panel</button></a></li>
                <li><a href="<?php echo ($GLOBALS['rootUrl']) ?>logout.php" class="button-signup"><button>Se
                            déconnecter</button></a></li>
            <?php } ?>
        </ul>
    </div>
    <div id="list-nav-button-login">
        <?php if (isLogged() === false) { ?>
            <a href="<?php echo ($GLOBALS['rootUrl']) ?>login.php?login" class="button-login"><button>Se
                    connecter</button></a>
            <a href="<?php echo ($GLOBALS['rootUrl']) ?>login.php?signup"
                class="button-signup"><button>S'inscrire</button></a>
        <?php } else { ?>
            <a href="<?php echo ($GLOBALS['rootUrl']) ?>panel/index.php" class="button-login"><button>Panel</button></a>
            <a href="<?php echo ($GLOBALS['rootUrl']) ?>logout.php" class="button-signup"><button>Se
                    déconnecter</button></a>
        <?php } ?>
    </div>
</nav>