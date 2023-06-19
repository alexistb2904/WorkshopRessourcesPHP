<?php
session_start();

include_once('config/mysql.php');
include_once('config/user.php');
include_once('variables.php');
include_once ('functions.php');

$postData = $_POST;

$rootPath = $_SERVER['DOCUMENT_ROOT'];
$rootUrl = 'https://' . $_SERVER['HTTP_HOST'] . '/';

if (isset($loggedUser['email'])) {
    echo 'Vous êtes déjà connecté.';
    header("refresh:5;$rootUrl/index.php");
    exit();
}

if (!isset($postData['username']) || !isset($postData['password']) || !isset($postData['email'])) {
    echo('Il faut remplir tous les champs pour pouvoir créer un compte');
    return;
} else {
    if (empty($postData['username']) || empty($postData['password']) || empty($postData['email'])) {
        echo('Il faut remplir tous les champs pour pouvoir créer un compte');
        return;
    } else {
        $username = mysqli_real_escape_string($mysqlClient,htmlspecialchars($postData['username']));
        $password = mysqli_real_escape_string($mysqlClient,htmlspecialchars($postData['password']));
        $email = mysqli_real_escape_string($mysqlClient,htmlspecialchars($postData['email']));
        $requete = "SELECT count(*) FROM users where 
        username = ' . $username . ' and email = ' . $email . '";
        $exec_requete = mysqli_query($mysqlClient,$requete);
        $reponse = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) {
            echo 'Ce compte existe déjà.';
            header("refresh:5;$rootUrl/index.php");
            exit();
        } else {
            $requete = "SELECT count(*) FROM users where username = ' . $username . ' or  email = ' . $email . '";
            $exec_requete = mysqli_query($mysqlClient,$requete);
            $reponse = mysqli_fetch_array($exec_requete);
            $count = $reponse['count(*)'];
            if($count!=0) {
                echo 'Ton nom d\'utilisateur ou ton adresse mail est déjà utilisé.';
                header("refresh:5;$rootUrl/index.php");
                exit();
            } else {
            $insertRecipe = $mysqlClient->prepare('INSERT INTO users(username, email, password) VALUES (:username, :email, :password)');
            $insertRecipe->execute([
                'username' => $username,
                'password' => $password,
                'email' => $email,
            ]);
            }
        }
    }
}

?>

<?php
$nameExtension = basename(__FILE__);
$name = pathinfo($nameExtension, PATHINFO_FILENAME);
$Cname = 'Création de compte';
$currentURL = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

$rootPath = $_SERVER['DOCUMENT_ROOT'];
$rootUrl = 'https://' . $_SERVER['HTTP_HOST'] . '/';

?>
<!doctype html>
<html lang="fr">
<head>
    <title><?php echo($Cname); ?> - WorkshopRessources</title>
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
    <meta name="title" content="<?php echo($Cname); ?> - WorkshopRessources">
    <meta name="description"
          content="Panel Administrateur">
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

<!-- Main -->
<main>
    <?php include_once($rootPath.'/header.php'); ?>

    <form action="" method="POST">
        <div style="display: flex; align-items: center; flex-direction: column">
            <h1><?php echo($username); ?> ton compte à bien été crée</h1>
            <p>Email : <?php echo($email); ?></p>
        </div>
    </form>
    <br/>
</main>
<?php include_once('../../footer.php'); ?>
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

