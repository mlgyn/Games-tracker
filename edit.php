<?php
// edit.php

require_once 'db.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $publisher = $_POST['publisher'];
    $rating = $_POST['rating'];

    $stmt = $db->prepare('UPDATE games SET name=?, publisher=?, rating=?, rating_date=NOW() WHERE id=?');
    $stmt->execute([$name, $publisher, $rating, $id]);

    header('Location: show.php?id=' . $id);
    exit;
}

$stmt = $db->prepare('SELECT * FROM games WHERE id = ?');
$stmt->execute([$id]);
$game = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier <?= $game['name'] ?></title>
</head>
<body>
    <h1>Modifier <?= $game['name'] ?></h1>
    <form action="" method="post">
        <label for="name">Titre:</label><br>
        <input type="text" id="name" name="name" value="<?= $game['name'] ?>"><br>
        <label for="publisher">Maison d'édition:</label><br>
        <input type="text" id="publisher" name="publisher" value="<?= $game['publisher'] ?>"><br>
        <label for="rating">Évaluation:</label><br>
        <input type="text" id="rating" name="rating" value="<?= $game['rating'] ?>"><br><br>
        <button type="submit">Enregistrer</button>
    </form>
</body>
</html>
