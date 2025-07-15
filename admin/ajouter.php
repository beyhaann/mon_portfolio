<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}
?>

<?php
require '../config.php';
if ($_POST) {
    $titre = $_POST['titre'];
    $desc = $_POST['description'];
    $stmt = $pdo->prepare("INSERT INTO projets (titre, description) VALUES (?, ?)");
    $stmt->execute([$titre, $desc]);
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
Titre: <input name="titre"><br>
Description: <textarea name="description"></textarea><br>
<button type="submit">Ajouter</button>
</form>
