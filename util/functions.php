<?php
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';


if ((substr($_SERVER['HTTP_HOST'], 0, strlen('localhost')) == 'localhost') || ($_SERVER['HTTP_HOST'] == "wslocal")) {
    $_ENV['MYSQL_HOST'] = "localhost";
    $_ENV['MYSQL_USERNAME'] = "root";
    $_ENV['MYSQL_PASSWORD'] = "";
    $_ENV['MYSQL_DATABASE'] = "s79805_WorkshopRessources";
}

$mysqlHost = $_ENV['MYSQL_HOST'];
$mysqlUser = $_ENV['MYSQL_USERNAME'];
$mysqlPassword = $_ENV['MYSQL_PASSWORD'];
$mysqlName = $_ENV['MYSQL_DATABASE'];
$mysqlPort = 3306;

try {
    $GLOBALS['mysqlClientPDO'] = new PDO(
        sprintf('mysql:host=%s;dbname=%s;port=%s', $mysqlHost, $mysqlName, 3306),
        $mysqlUser,
        $mysqlPassword
    );
    $GLOBALS['mysqlClientPDO']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $exception) {
    die('Erreur : ' . $exception->getMessage());
}

$GLOBALS['mysqlClient'] = mysqli_connect($mysqlHost, $mysqlUser, $mysqlPassword, $mysqlName);

function isAdmin($email)
{
    $userAdminFetch = 'SELECT * FROM users WHERE email = ? AND isAdmin = 1;';
    $mysqlHost = $_ENV['MYSQL_HOST'];
    $mysqlUser = $_ENV['MYSQL_USERNAME'];
    $mysqlPassword = $_ENV['MYSQL_PASSWORD'];
    $mysqlName = $_ENV['MYSQL_DATABASE'];
    $mysqlClient = mysqli_connect($mysqlHost, $mysqlUser, $mysqlPassword, $mysqlName);
    $stmt = mysqli_prepare($mysqlClient, $userAdminFetch);
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $stmt->close();
    if ($result && mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }
}

function isLogged()
{
    if (isset($_SESSION['isLogged']) && ($_SESSION['isLogged'] === true) && isset($_SESSION['username']) && isset($_SESSION['email'])) {
        return true;
    } else {
        return false;
    }
}
function getName()
{
    if (isset($_SESSION['username'])) {
        return $_SESSION['username'];
    } else {
        return null;
    }
}

function getCreatorById($id, $table)
{
    if (!isAllowed($table)) {
        return null;
    }
    if (!isset($id, $table)) {
        return null;
    } else {
        $getById = 'SELECT `creator_name` FROM ' . $table . ' WHERE id = ' . $id . ';';
        $result = $GLOBALS['mysqlClient']->prepare($getById);
        $result->execute();
        $items = array();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $items[] = $row;
        }
        $result->closeCursor();
        return $items;
    }
}

function getById($id, $table)
{
    if (!isAllowed($table)) {
        return null;
    }
    if (!isset($id, $table)) {
        return null;
    } else {
        $getById = 'SELECT * FROM ' . $table . ' WHERE id = ' . $id . ';';
        $result = $GLOBALS['mysqlClient']->prepare($getById);
        $result->execute();
        $ListItems = array();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $ListItems[] = $row;
        }
        $result->closeCursor();
        return $ListItems;
    }
}
function getSelfTable($table)
{
    if (!isAllowed($table)) {
        return null;
    }
    $mysqlClient = $GLOBALS['mysqlClientPDO'];
    if (isset($table)) {
        $getItemNumber = "SELECT * FROM " . $table . " WHERE `creator_name` = '" . $_SESSION['username'] . "' ORDER BY id DESC;";
        $resultStatement = $mysqlClient->prepare($getItemNumber);
        $resultStatement->execute();
        $items = array();

        while ($row = $resultStatement->fetch(PDO::FETCH_ASSOC)) {
            $items[] = $row;
        }
        $resultStatement->closeCursor();
        return $items;
    } else {
        return null;
    }
}

function getItem($table, $status, $limit = 'all')
{
    if (!isAllowed($table)) {
        return null;
    }
    $mysqlClient = $GLOBALS['mysqlClientPDO'];
    if (isset($table)) {
        if (($limit === 'all') || !isset($limit)) {
            if (isset($status) && ($status === 1) || ($status === 0)) {
                $getItemNumber = 'SELECT * FROM ' . $table . ' WHERE is_enabled = ' . $status . ' ORDER BY id DESC;';
            } else {
                $getItemNumber = 'SELECT * FROM ' . $table . ' ORDER BY id DESC;';
            }
        } else {
            if (isset($status) && ($status === 1) || ($status === 0)) {
                $getItemNumber = 'SELECT * FROM ' . $table . ' WHERE is_enabled = ' . $status . ' ORDER BY id DESC LIMIT ' . $limit . ';';
            } else {
                $getItemNumber = 'SELECT * FROM ' . $table . ' ORDER BY id DESC LIMIT ' . $limit . ';';
            }
        }
        $resultStatement = $mysqlClient->prepare($getItemNumber);
        $resultStatement->execute();
        $items = array();

        while ($row = $resultStatement->fetch(PDO::FETCH_ASSOC)) {
            $items[] = $row;
        }
        $resultStatement->closeCursor();
        return $items;
    } else {
        return null;
    }
}

function startSession()
{
    if (session_status() === PHP_SESSION_NONE) {
        return session_start();
    }
}

function getAllTable($table)
{
    if (!isAllowed($table)) {
        return null;
    }
    $mysqlClient = $GLOBALS['mysqlClientPDO'];
    if (isset($table)) {
        $getAllTable = "SELECT * FROM " . $table . " ORDER BY id DESC ;";
        $resultStatement = $mysqlClient->prepare($getAllTable);
        $resultStatement->execute();
        $items = array();

        while ($row = $resultStatement->fetch(PDO::FETCH_ASSOC)) {
            $items[] = $row;
        }
        $resultStatement->closeCursor();
        return $items;
    } else {
        return null;
    }
}

function getTable($table, $numberOfItem, $startAt, $withStatus = 1)
{
    if (!isAllowed($table)) {
        return null;
    }
    $mysqlClient = $GLOBALS['mysqlClientPDO'];
    if (isset($table) && isset($numberOfItem) && isset($startAt)) {
        if (isset($withStatus) && ($withStatus === 1)) {
            $getTable = "SELECT * FROM " . $table . " WHERE `is_enabled` = " . $withStatus . " ORDER BY id DESC LIMIT " . $numberOfItem . " OFFSET " . $startAt . ";";
        } else {
            $getTable = "SELECT * FROM " . $table . " ORDER BY id DESC LIMIT " . $numberOfItem . " OFFSET " . $startAt . ";";
        }
        $resultStatement = $mysqlClient->prepare($getTable);
        $resultStatement->execute();
        $items = array();

        while ($row = $resultStatement->fetch(PDO::FETCH_ASSOC)) {
            $items[] = $row;
        }
        $resultStatement->closeCursor();
        return $items;
    } else {
        return null;
    }
}

function sendEmail($to, $subject, $message)
{
    $email = new \SendGrid\Mail\Mail();
    $email->setFrom("support@workshopressources.fr", "Workshop Ressources");
    $email->setSubject($subject);
    $email->addTo($to, $to);
    $email->addContent(
        "text/html",
        $message
    );
    $sendgrid = new \SendGrid($_ENV['SENGRID_KEY']);
    try {
        $response = $sendgrid->send($email);
        /*print $response->statusCode() . "\n";
        print_r($response->headers());
        print $response->body() . "\n";*/
    } catch (Exception $e) {
        echo 'Caught exception: ' . $e->getMessage() . "\n";
    }
}

function checkLang()
{

    if (isset($_GET['lang'])) {
        $GLOBALS['lang'] = $_GET['lang'];
        $_SESSION['lang'] = $GLOBALS['lang'];
    } elseif (isset($_SESSION['lang'])) {
        $GLOBALS['lang'] = $_SESSION['lang'];
    } else {
        $GLOBALS['lang'] = 'fr_FR';
    }
    $lang_file = __DIR__ . "/../assets/lang/" . $GLOBALS['lang'] . ".json";

    if (file_exists($lang_file)) {
        $GLOBALS['messageLocales'] = json_decode(file_get_contents($lang_file), true);
    } else {
        $GLOBALS['messageLocales'] = json_decode(file_get_contents(__DIR__ . "/../assets/lang/fr_FR.json"), true);
    }
}

checkLang();

function lang($text)
{
    return isset($GLOBALS['messageLocales'][$text]) ? $GLOBALS['messageLocales'][$text] : $text;
}

function isAllowed($str) {
    $allowedTable = ['alexcars', 'azok30', 'decals', 'decals_c', 'itzdannio25', 'novalife', 'novalife_flocage', 'other', 'rytrak', 'sgm', 'users', 'w4nou', 'zebra', 'zebra_c'];
    if (in_array($str, $allowedTable)) {
        return true;
    } else {
        return false;
    }
}