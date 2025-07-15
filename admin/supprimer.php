<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}
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

?>



<?php
require '../config.php';
$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM projets WHERE id=?");
$stmt->execute([$id]);
header('Location: admin.php');
?>
