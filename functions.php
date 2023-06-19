<?php
function display_car(array $category) : string
{
    $category_display = '<div class="grid-download">';
    $category_display .= '<div class="grid-download-item">';
    $category_display .= '<div class="grid-download-item-img">';
    $category_display .= '<img src=' . $category['car_photo'] . ' alt=' . $category['car_title'] . ';>';
    $category_display .= '</div>';
    $category_display .= '<a href="' . $category['car_url'] . '" target="_blank">';
    $category_display .= '<p>' . $category['car_title'] . '</p>';
    $category_display .= '</a>';
    $category_display .= '<a class="grid-download-item-a" href=' . $category['car_photo'] . 'download>Télécharger</a>';
    $category_display .= '</div>';
    $category_display .= '</div>';

    return $category_display;
}

function get_car(array $category) : array
{
    $category_display = [];
    foreach($category as $category_item) {
        $category_display[] = $category_item;
    }

    return $category_display;
}

function is_admin($email): bool
{
    $host = $_ENV['MYSQL_HOST'];
    $username = $_ENV['MYSQL_USERNAME'];
    $password = $_ENV['MYSQL_PASSWORD'];
    $database = $_ENV['MYSQL_DATABASE'];

    $mysqlClient = mysqli_connect($host, $username, $password, $database);

    // Prepare the SQL statement with a placeholder for the email
    $userAdminFetch = 'SELECT * FROM users WHERE email = ? AND admin = 1;';
    $stmt = mysqli_prepare($mysqlClient, $userAdminFetch);

    // Bind the email parameter to the prepared statement
    mysqli_stmt_bind_param($stmt, 's', $email);

    // Execute the prepared statement
    mysqli_stmt_execute($stmt);

    // Get the result
    $result = mysqli_stmt_get_result($stmt);

    // Check if the query returned any rows
    if ($result && mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }
}

function logout() {
    // Unset session variables
    $_SESSION = [];

    // Delete session cookie
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time() - 3600, '/');
    }

    // Destroy the session
    session_destroy();

    // Delete the loggedUser cookie
    setcookie('LOGGED_USER', '', time() - 3600, '/');

    // Redirect to the login page or any other desired page
    header('Location: home.php');
    exit;
}


