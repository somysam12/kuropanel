<?php
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR);
define('APPPATH', __DIR__ . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR);
define('SYSTEMPATH', __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'codeigniter4' . DIRECTORY_SEPARATOR . 'framework' . DIRECTORY_SEPARATOR . 'system' . DIRECTORY_SEPARATOR);
define('ROOTPATH', __DIR__ . DIRECTORY_SEPARATOR);

require_once SYSTEMPATH . 'Common.php';
require_once APPPATH . 'Config/Constants.php';
require_once APPPATH . 'Helpers/nata_helper.php';

// Try standard PHP connection to the local MySQL server
$hostname = '127.0.0.1';
$username = 'fallenxt_jangrashab';
$password = 'fallenxt_jangrashab';
$database = 'fallenxt_jangrashab';

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$user = 'shaitaan';
$pass = 'shaitaan';
$hash = create_password($pass, true);

// Check if user exists
$check = mysqli_query($conn, "SELECT id_users FROM users WHERE username = '$user'");
if (mysqli_num_rows($check) > 0) {
    $sql = "UPDATE users SET password = '$hash', level = 1, status = 1 WHERE username = '$user'";
    mysqli_query($conn, $sql);
    echo "User 'shaitaan' password updated.\n";
} else {
    $sql = "INSERT INTO users (username, password, fullname, level, status, saldo, uplink) VALUES ('$user', '$hash', 'Shaitaan Admin', 1, 1, 1000000, 'Owner')";
    mysqli_query($conn, $sql);
    echo "User 'shaitaan' created.\n";
}

mysqli_close($conn);
