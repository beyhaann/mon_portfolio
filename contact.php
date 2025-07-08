<?php
//connexion à la base
require_once("db.php");

//vérification du formulaire
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Protection contre les injections
    $nom = htmlspecialchars(trim($_POST["nom"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    //validation basique
    if (!empty($nom) && !empty($email) && !empty($message)) {
        //requête SQL préparée
        $stmt = $conn->prepare("INSERT INTO contact (nom, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nom, $email, $message);

        if ($stmt->execute()) {
            echo "<p style='color:green;'>Votre message a bien été envoyé !</p>";
        } else {
            echo "<p style='color:red;'>Erreur lors de l’envoi. Veuillez réessayer.</p>";
        }

        $stmt->close();
    } else {
        echo "<p style='color:red;'>Tous les champs sont obligatoires.</p>";
    }
}
?>
