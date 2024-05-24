<?php
// show.php

require_once 'db.php';

$id = $_GET['id'];

$stmt = $db->prepare('SELECT * FROM games WHERE id = ?');
$stmt->execute([$id]);
$game = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $game['name'] ?></title>
</head>
<body>
    <h1><?= $game['name'] ?></h1>
    <p>Maison d'édition : <?= $game['publisher'] ?></p>
    <p>Évaluation : <?= $game['rating'] ?></p>
    <p>Date d'évaluation : <?= $game['rating_date'] ?></p>
    <a href="edit.php?id=<?= $id ?>">Modifier</a>
</body>
</html>
