<?php
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR);
define('APPPATH', __DIR__ . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR);
define('SYSTEMPATH', __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'codeigniter4' . DIRECTORY_SEPARATOR . 'framework' . DIRECTORY_SEPARATOR . 'system' . DIRECTORY_SEPARATOR);
define('ROOTPATH', __DIR__ . DIRECTORY_SEPARATOR);

require_once SYSTEMPATH . 'Common.php';
require_once APPPATH . 'Config/Constants.php';
require_once APPPATH . 'Helpers/nata_helper.php';

// Manual connection using standard PHP (no mysqli needed if we can't find it, but let's try mysqli first)
$db_config = [
    'hostname' => 'localhost',
    'username' => 'fallenxt_jangrashab',
    'password' => 'fallenxt_jangrashab',
    'database' => 'fallenxt_jangrashab',
];

$conn = mysqli_connect($db_config['hostname'], $db_config['username'], $db_config['password'], $db_config['database']);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$usernam = 'shaitaan';
$password = 'shaitaan';
$hash = create_password($password, true);

$sql = "UPDATE users SET password = ?, level = 1, status = 1 WHERE username = 'admin'";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $hash);
mysqli_stmt_execute($stmt);

if (mysqli_stmt_affected_rows($stmt) > 0) {
    echo "Password for user 'admin' updated to 'shaitaan'\n";
} else {
    $sql = "INSERT INTO users (username, password, fullname, level, status, saldo, uplink) VALUES (?, ?, 'Shaitaan Admin', 1, 1, 1000000, 'Owner')";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $usernam, $hash);
    mysqli_stmt_execute($stmt);
    echo "User 'shaitaan' created with password 'shaitaan'\n";
}

mysqli_close($conn);
