<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}
?>

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = htmlspecialchars($_POST['titre']);
    $description = htmlspecialchars($_POST['description']);
    $lien = htmlspecialchars($_POST['lien']);

    $sql = "INSERT INTO projets (titre, description, lien) VALUES (:titre, :description, :lien)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':titre', $titre);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':lien', $lien);

    if ($stmt->execute()) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Erreur lors de l’ajout du projet.";
    }
}

}
?>
<form method="post">
Titre: <input name="titre" value="<?= htmlspecialchars($projet['titre']) ?>"><br>
Description: <textarea name="description"><?= htmlspecialchars($projet['description']) ?></textarea><br>
<button type="submit">Modifier</button>
</form>
