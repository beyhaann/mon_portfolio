<?php
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    if ($username === "admin" && $password === "admin123") {
        $_SESSION['loggedin'] = true;
        header("Location: admin.php");
        exit();
    } else {
        $error = "Identifiants incorrects";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Connexion Admin</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h2>Connexion Admin</h2>
<?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
<form method="POST">
<label for="username">Nom d'utilisateur :</label>
<input type="text" name="username" required><br>
<label for="password">Mot de passe :</label>
<input type="password" name="password" required><br>
<button type="submit">Se connecter</button>
</form>
</body>
</html>
