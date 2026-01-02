<?php
$db_config = [
    'hostname' => 'localhost',
    'username' => 'fallenxt_jangrashab',
    'password' => 'fallenxt_jangrashab',
    'database' => 'fallenxt_jangrashab',
];

$conn = mysqli_connect($db_config['hostname'], $db_config['username'], $db_config['password'], $db_config['database']);
if (!$conn) die("Failed to connect");

$patt = "XquxmymXDtWRA66D";
$password = 'admin';
$hash_md5 = md5($patt . $password);
$final_hash = password_hash($hash_md5, PASSWORD_DEFAULT, ['cost' => 8]);

// Update admin user
$stmt = mysqli_prepare($conn, "UPDATE users SET password = ?, level = 1, status = 1 WHERE username = 'admin'");
mysqli_stmt_bind_param($stmt, "s", $final_hash);
mysqli_stmt_execute($stmt);

if (mysqli_stmt_affected_rows($stmt) <= 0) {
    // Insert if not exists
    $stmt = mysqli_prepare($conn, "INSERT INTO users (username, password, fullname, level, status, saldo, uplink) VALUES ('admin', ?, 'Admin', 1, 1, 1000000, 'Owner')");
    mysqli_stmt_bind_param($stmt, "s", $final_hash);
    mysqli_stmt_execute($stmt);
}
mysqli_close($conn);
