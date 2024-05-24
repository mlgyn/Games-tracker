<?php
// index.php

require_once 'db.php';

$stmt = $db->query('SELECT id, name FROM games');
$games = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des jeux vidéos</title>
</head>
<body>
    <h1>Liste des jeux vidéos</h1>
    <ul>
        <?php foreach ($games as $game): ?>
            <li>
                <a href="show.php?id=<?= $game['id'] ?>">
                    <?= $game['name'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
