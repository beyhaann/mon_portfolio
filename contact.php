<?php

require_once("db.php");
echo "db.php chargé.<br>";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = htmlspecialchars(trim($_POST["nom"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));
    echo "POST reçu : $nom, $email, $message<br>";

    if (!empty($nom) && !empty($email) && !empty($message)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO contact (nom, email, message) VALUES (?, ?, ?)");
            $result = $stmt->execute([$nom, $email, $message]);
            echo "execute() a renvoyé : " . ($result ? "true" : "false") . "<br>";
            if ($result) {
                echo "<p style='color:green;'>Votre message a bien été envoyé !</p>";
            }
        } catch (PDOException $e) {
            echo "<p style='color:red;'>Erreur PDO : " . $e->getMessage() . "</p>";
        }
    } else {
        echo "<p style='color:red;'>Tous les champs sont obligatoires.</p>";
    }
}
?>
