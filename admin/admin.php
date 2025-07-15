<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}
?>



<?php
require '../config.php'; //connexion PDO

$stmt = $pdo->query("SELECT * FROM projets");
$projets = $stmt->fetchAll();
?>
<h1>Gestion des projets</h1>
<a href="ajouter.php">Ajouter un projet</a>
<table>
<tr><th>Titre</th><th>Actions</th></tr>
<?php foreach ($projets as $p): ?>
<tr>
<td><?= htmlspecialchars($p['titre']) ?></td>
<td>
<a href="modifier.php?id=<?= $p['id'] ?>">Modifier</a> |
<a href="supprimer.php?id=<?= $p['id'] ?>" onclick="return confirm('Supprimer ?');">Supprimer</a>
</td>
</tr>
<?php endforeach; ?>
</table>

<a href="logout.php">Se déconnecter</a>
