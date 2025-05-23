<?php
const BY_SERVER = true;
include_once 'util/functions.php';
include_once 'util/variables.php';
startSession();

$postData = $_POST;
$rootUrl = $GLOBALS['rootUrl'];
$mysqlClient = $GLOBALS['mysqlClientPDO'];

if (isset($postData['type'])) {
    if ($postData['type'] === 'login') {
        if (isset($postData['username']) && isset($postData['password'])) {
            foreach ($GLOBALS['users'] as $user) {
                if (htmlspecialchars($user['email']) === htmlspecialchars($postData['username']) && password_verify($postData['password'], htmlspecialchars($user['password']))) {
                    $loggedUser = ['logged' => true, 'username' => htmlspecialchars($user['username']), 'email' => htmlspecialchars($user['email'])];
                    $_SESSION['isLogged'] = $loggedUser['logged'];
                    $_SESSION['username'] = $loggedUser['username'];
                    $_SESSION['email'] = $loggedUser['email'];
                    header("Refresh:0; url=index.php");
                } elseif (htmlspecialchars($user['username']) === htmlspecialchars($postData['username']) && password_verify($postData['password'], htmlspecialchars($user['password']))) {
                    $loggedUser = ['logged' => true, 'username' => htmlspecialchars($user['username']), 'email' => htmlspecialchars($user['email'])];
                    $_SESSION['isLogged'] = $loggedUser['logged'];
                    $_SESSION['username'] = $loggedUser['username'];
                    $_SESSION['email'] = $loggedUser['email'];
                    header("Refresh:0; url=index.php");
                } else {
                    $errorMessage = lang("error_login_not_match");
                }
            }
        } else {
            $errorMessage = lang("error_login_empty");
        }
    } else if ($postData['type'] === 'signup') {
        if (!isset($postData['username']) || !isset($postData['password']) || !isset($postData['email'])) {
            $errorMessage = lang("error_login_empty");
        } else {
            if (empty($postData['username']) || empty($postData['password']) || empty($postData['email'])) {
                $errorMessage = lang("error_login_empty");
            } else {
                $username = htmlspecialchars($postData['username']);
                $password = htmlspecialchars(password_hash($postData['password'], PASSWORD_DEFAULT));
                $email = htmlspecialchars($postData['email']);

                $stmt = $mysqlClient->prepare("SELECT COUNT(*) FROM users WHERE username = :username AND email = :email");
                $stmt->execute([
                    'username' => $username,
                    'email' => $email
                ]);
                $count = $stmt->fetchColumn();

                if ($count != 0) {
                    $errorMessage = lang("error_already_exist");
                } else {
                    $stmt = $mysqlClient->prepare("SELECT COUNT(*) FROM users WHERE username = :username OR email = :email");
                    $stmt->execute([
                        'username' => $username,
                        'email' => $email
                    ]);
                    $count = $stmt->fetchColumn();

                    if ($count != 0) {
                        $errorMessage = lang('error_mail_or_username_aleardy_exist');
                    } else {
                        $stmt = $mysqlClient->prepare('INSERT INTO users (username, email, password) VALUES (:username, :email, :password)');
                        $stmt->execute([
                            'username' => $username,
                            'email' => $email,
                            'password' => $password
                        ]);
                        header("Refresh:0; url=index.php");
                        die();
                    }
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="<?= $GLOBALS['lang'] ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Optimisez vos projets avec WorkshopRessource : découvrez nos outils exclusifs, incluant des décals et autres ressources, 100% Open-Source. Accédez à des tutoriels détaillés pour enrichir vos compétences. Élevez la qualité de vos projets grâce à des ressources exceptionnelles.">
    <meta name="keywords" content="workshop, ressources, gratuit, tutoriels, gmod, zébra, decals, template, créateur, jeu, garry's mod, novalife, nova-life">
    <meta name="author" content="Alexis Thierry-Bellefond">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@alexistb2904">
    <meta name="twitter:title" content="WorkshopRessources - +100 Ressources pour vous">
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
    <title>WorkshopRessources - <?= lang('login_page_title') ?></title>
</head>

<body>
    <header>
        <?php include_once 'components/nav_bar.php' ?>
    </header>
    <main>
        <?php if (isLogged() === false) { ?>
            <div class="login-signup-container">
                <div class="login-signup" id="login">
                    <h1><?= lang('login_string') ?></h1>
                    <?php if (isset($errorMessage)) { ?>
                        <div class="error-message">
                            <p style="color: gray;">
                                <?php echo ($errorMessage) ?>
                            </p>
                        </div>
                    <?php } ?>
                    <form action="" method="post">
                        <div class="input-container">
                            <label for="username-l"><?= lang('login_user_or_email') ?></label>
                            <input type="text" name="username" id="username-l" placeholder="<?= lang('login_user_or_email') ?>">
                        </div>
                        <div class="input-container">
                            <label for="password-l"><?= lang('login_password') ?></label>
                            <input type="password" name="password" id="password-l" placeholder="<?= lang('login_password') ?>">
                        </div>
                        <label hidden>
                            <input type="text" value="login" name="type" hidden>
                        </label>
                        <div class="input-container">
                            <input type="submit" value="<?= lang('login_string') ?>">
                        </div>
                    </form>
                    <button onclick="showRegister()"><?= lang('register_string') ?></button>

                    <p style="font-size: 80%; margin-top: 5%;"><?= lang('by_the_continuing') ?><a href="mentions-legale.php"><?= lang('terms_of_service') ?></a></p>
                </div>
                <div class="login-signup" id="sign-up">
                    <h1><?= lang('register_string') ?></h1>
                    <?php if (isset($errorMessage)) { ?>
                        <div class="error-message">
                            <p style="color: gray;">
                                <?php echo ($errorMessage) ?>
                            </p>
                        </div>
                    <?php } ?>
                    <form action="" method="post">
                        <div class="input-container">
                            <label for="username-s"><?= lang('username_string') ?></label>
                            <input type="text" name="username" id="username-s" placeholder="<?= lang('username_string') ?>">
                        </div>
                        <div class="input-container">
                            <label for="email-s"><?= lang('email_string') ?></label>
                            <input type="email" name="email" id="email-s" placeholder="<?= lang('email_string') ?>">
                        </div>
                        <div class="input-container">
                            <label for="password-s"><?= lang('password_string') ?></label>
                            <input type="password" name="password" id="password-s" placeholder="<?= lang('password_string') ?>">
                        </div>
                        <label hidden>
                            <input type="text" value="signup" name="type" hidden>
                        </label>
                        <div class="input-container">
                            <input type="submit" value="<?= lang('register_string') ?>">
                        </div>
                    </form>
                    <button onclick="showLogin()"><?= lang('aleardy_have_account') ?></button>
                    <p style="font-size: 80%; margin-top: 5%;"><?= lang('by_the_continuing') ?><a href="mentions-legale.php"><?= lang('terms_of_service') ?></a></p>
                </div>
            </div>
        <?php } else { ?>
            <div class="login-signup" style="display: flex; justify-content: center; align-items: center; margin: 0 15% 0 15%;">
                <h1 style="color: white; margin: 5% 0 5% 0; text-align: center;"><?= lang('aleardy_logged') ?></h1>
                <a href="<?php echo ($GLOBALS['rootUrl']) ?>"
                    style="background: none; outline: white 0.1rem solid; padding: 1.5% 5% 1.5% 5%; color: white; text-decoration: none; border-radius: 1rem; margin-bottom: 2%;"><?= lang('nav_home') ?></a>
                <p style="background-color: #1F1F1F; padding: 1% 3% 1% 3%; color: white; text-decoration: none; border-radius: 1rem; margin-bottom: 5%;"><?= lang('redirect_to_home') ?>
                </p>
            </div>
            <script>
                setTimeout(function() {
                    window.location.replace("<?php echo ($GLOBALS['rootUrl']) ?>");
                }, 300);
            </script>

        <?php } ?>
    </main>
    <?php include_once 'components/footer.php'; ?>
    <script src="<?php echo ($GLOBALS['rootUrl']) ?>js/login.js"></script>
</body>

</html>