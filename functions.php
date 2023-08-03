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
    if ($_SERVER['HTTP_HOST'] === 'localhost') {
        $_ENV['MYSQL_HOST'] = $_SERVER['MYSQL_HOST'];
        $_ENV['MYSQL_USERNAME'] = $_SERVER['MYSQL_USERNAME'];
        $_ENV['MYSQL_PASSWORD'] = $_SERVER['MYSQL_PASSWORD'];
        $_ENV['MYSQL_DATABASE'] = $_SERVER['MYSQL_DATABASE'];
    }
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


$GLOBALS['rooturl']  = $_SERVER['DOCUMENT_ROOT'];
if ($_SERVER['HTTP_HOST'] === 'localhost') {
    $GLOBALS['rooturl'] = 'http://' . $_SERVER['HTTP_HOST'] . '/';
} else {
    $GLOBALS['rooturl']  = 'https://' . $_SERVER['HTTP_HOST'] . '/';
}

$GLOBALS['currentURL'] = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];


