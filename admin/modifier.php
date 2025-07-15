<?php
require '../config.php';
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM projets WHERE id=?");
$stmt->execute([$id]);
$projet = $stmt->fetch();

if ($_POST) {
    $titre = $_POST['titre'];
    $desc = $_POST['description'];
    $stmt = $pdo->prepare("UPDATE projets SET titre=?, description=? WHERE id=?");
    $stmt->execute([$titre, $desc, $id]);
    header('Location: admin.php');
}
?>
<form method="post">
Titre: <input name="titre" value="<?= htmlspecialchars($projet['titre']) ?>"><br>
Description: <textarea name="description"><?= htmlspecialchars($projet['description']) ?></textarea><br>
<button type="submit">Modifier</button>
</form>
