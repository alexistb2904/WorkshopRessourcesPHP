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
    $host = $_SERVER['MYSQL_HOST'];
    $username = $_SERVER['MYSQL_USERNAME'];
    $password = $_SERVER['MYSQL_PASSWORD'];
    $database = $_SERVER['MYSQL_DATABASE'];

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
