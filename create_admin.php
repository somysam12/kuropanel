<?php
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR);
define('APPPATH', __DIR__ . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR);
define('SYSTEMPATH', __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'codeigniter4' . DIRECTORY_SEPARATOR . 'framework' . DIRECTORY_SEPARATOR . 'system' . DIRECTORY_SEPARATOR);

require_once SYSTEMPATH . 'Common.php';
require_once APPPATH . 'Config/Constants.php';
require_once APPPATH . 'Helpers/nata_helper.php';

$usernam = 'shaitaan';
$password = 'shaitaan';
$hash = create_password($password, true);

// Manual mysqli since bootstrap is failing
$db_config = [
    'hostname' => 'localhost',
    'username' => 'fallenxt_jangrashab',
    'password' => 'fallenxt_jangrashab',
    'database' => 'fallenxt_jangrashab',
];

$conn = new mysqli($db_config['hostname'], $db_config['username'], $db_config['password'], $db_config['database']);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO users (username, password, fullname, level, status, saldo, uplink) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$fullname = 'Shaitaan Admin';
$level = 1;
$status = 1;
$saldo = 1000000;
$uplink = 'Owner';

$stmt->bind_param("sssiids", $usernam, $hash, $fullname, $level, $status, $saldo, $uplink);

if ($stmt->execute()) {
    echo "User 'shaitaan' created successfully.\n";
} else {
    echo "Error: " . $stmt->error . "\n";
}

$conn->close();
