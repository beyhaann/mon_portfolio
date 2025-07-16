<?php
$host = 'sql102.infinityfree.com';
$dbname = 'if0_39478303_portfolio';
$username = 'if0_39478303';
$password = 'Pipinan17';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    http_response_code(500);
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
    exit;
}
?>
