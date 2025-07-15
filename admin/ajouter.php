<?php
require '../config.php';
if ($_POST) {
    $titre = $_POST['titre'];
    $desc = $_POST['description'];
    $stmt = $pdo->prepare("INSERT INTO projets (titre, description) VALUES (?, ?)");
    $stmt->execute([$titre, $desc]);
    header('Location: admin.php');
}
?>
<form method="post">
Titre: <input name="titre"><br>
Description: <textarea name="description"></textarea><br>
<button type="submit">Ajouter</button>
</form>
