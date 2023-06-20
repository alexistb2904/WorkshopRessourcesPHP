<?php session_start();

include_once('../config/mysql.php');
include_once('../variables.php');
include_once('../functions.php');

$nameExtension = basename(__FILE__);
$name = pathinfo($nameExtension, PATHINFO_FILENAME);
$Cname = ucfirst($name);
$currentURL = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

$rootPath = $_SERVER['DOCUMENT_ROOT'];
$rootUrl = 'https://' . $_SERVER['HTTP_HOST'] . '/';

$zebra_c_pFetch = $mysqlClient->prepare('SELECT * FROM zebra_c WHERE creator_name = :creator_name');
$zebra_c_pFetch->execute([
    'creator_name' => (string)$loggedUser['pseudo']
]);
$zebra_c_p = $zebra_c_pFetch->fetchAll();

$decals_c_pFetch = $mysqlClient->prepare('SELECT * FROM decals_c WHERE creator_name = :creator_name');
$decals_c_pFetch->execute([
    'creator_name' => (string)$loggedUser['pseudo']
]);
$decals_c_p = $decals_c_pFetch->fetchAll();

?>
<!doctype html>
<html lang="fr">
<head>
    <title><?php echo($Cname); ?> - Création</title>
    <!-- Required meta tags -->
    <link rel="stylesheet" href="<?php echo($rootUrl). 'style-admin.css'?>">
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
    <meta name="title" content="<?php echo($Cname); ?> - Création">
    <meta name="description"
          content="Panel Création">
    <meta name="keywords"
          content="<?php echo($Cname); ?>,workshop,ressources,steam,download,template,gratuit,free,vehicle,véhicule,voiture,3D,police,secours,pompiers,png,jpeg,jpg,alexistb2904">


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

<body>

<!-- Navigation -->
<?php include_once('../header.php'); ?>

<!-- Main -->
<?php include_once('../variables.php'); ?>

<?php if(isset($loggedUser)) { ?>

    <?php
    $creator_list = [
        'zebra_c_p',
        'decals_c_p',
        'other',
    ];
    ?>

    <main>
        <?php foreach ($creator_list as $variableName) : ?>
            <details>
                <?php $Cname = ucfirst($variableName);
                if($Cname == "Zebra_c_p") {
                    $Cname = "Zebra Communauté";
                } else if($Cname == "Decals_c_p") {
                    $Cname = "Decals Communauté";
                } else if($Cname == "Other") {
                    $Cname = "Autre";
                }
                ?>
                <summary><?php echo $Cname; ?></summary>
                <div class="grid-download">
                    <?php foreach ($$variableName as $category_item) : ?>
                        <div class="grid-download-item">
                            <div class="grid-download-item-img">
                                <?php if(strpos($category_item['photo'], "http://") === 0 || strpos($category_item['photo'], "https://") === 0) { ?>
                                <img src="<?php echo($category_item['photo']) ?>"
                                     alt="<?php echo $category_item['title']; ?>" loading="lazy">
                                <?php } else { ?>
                                    <img src="../<?php echo($rootUrl).$category_item['photo']; ?>"
                                         alt="<?php echo $category_item['title']; ?>" loading="lazy">
                                <?php } ?>
                            </div>
                            <a href="<?php echo $category_item['url']; ?>" target="_blank">
                                <p><?php echo $category_item['title']; ?></p>
                                <p style="color:gray; font-size: 1vmax;"><?php echo $category_item['creator_name']; ?></p>
                                <?php if($category_item['is_enabled']) { ?>
                                    <p style="color:darkgreen">Activé</p>
                                <?php } else { ?>
                                    <p style="color:darkred; font-size: 1vmax;">En attente d'approbation | Désactivé</p>
                                <?php } ?>
                            </a>
                            <a class="link-warning grid-download-item-a" href="update.php?id=<?php echo $category_item['id']; ?>&title=<?php echo $category_item['title']; ?>&photo=<?php echo $category_item['photo']; ?>&creator=<?php echo $variableName; ?>&url=<?php echo $category_item['url']; ?>&creator_name=<?php echo $category_item['creator_name']; ?>">Editer</a>
                            <a class="link-danger grid-download-item-a" href="delete.php?id=<?php echo $category_item['id']; ?>&title=<?php echo $category_item['title']; ?>&photo=<?php echo $category_item['photo']; ?>&creator=<?php echo $variableName; ?>&creator_name=<?php echo $category_item['creator_name']; ?>">Supprimer</a>
                        </div>
                    <?php endforeach; ?>
                    <div class="grid-download-plus">
                        <div class="grid-download-item-plus">
                            <a href="create.php?creator=<?php echo $variableName; ?>&creator_name=<?php echo $loggedUser['pseudo']; ?>">
                                <img src="https://cdn-icons-png.flaticon.com/512/226/226974.png"
                                     alt="Plus Image" loading="lazy">
                            </a>
                        </div>
                    </div>
                </div>
            </details>
        <?php endforeach; ?>
        <a class="nav-link" href="<?php echo($rootUrl). 'user/home.php'; ?>">Panel User</a>
    </main>
<?php } else { ?>

    <h1 style="color: white; margin-bottom: 20vmax; margin-top: 20vmax">Vous n'avez pas les droits pour accéder à cette page.</h1>

<?php } ?>

<?php include_once('../footer.php'); ?>
<script>
    var dropdown = document.getElementsByClassName("btn-dropdown-ws");
    var i;

    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function () {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    }
</script>
</body>
</html>