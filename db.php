<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'volunteam');
define('DB_USER', 'volunt_user');
define('DB_PASS', 'jdu2352h');

try {
    $pdo = new PDO(
        'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8',
        DB_USER, DB_PASS,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    die('Error de conexión: ' . $e->getMessage());
}
