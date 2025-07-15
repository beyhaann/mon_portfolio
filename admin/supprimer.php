<?php
require '../config.php';
$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM projets WHERE id=?");
$stmt->execute([$id]);
header('Location: admin.php');
?>
