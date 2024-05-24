<?php
// create.php

require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $publisher = $_POST['publisher'];
    $rating = $_POST['rating'];

    $stmt = $db->prepare('INSERT INTO games (name, publisher, rating, rating_date) VALUES (?, ?, ?, NOW())');
    $stmt->execute([$name, $publisher, $rating]);

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer un jeu vidéo</title>
</head>
<body>
    <h1>Créer un jeu vidéo</h1>
    <form action="" method="post">
        <label for="name">Titre:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="publisher">Maison d'édition:</label><br>
        <input type="text" id="publisher" name="publisher"><br>
        <label for="rating">Évaluation:</label><br>
        <input type="text" id="rating" name="rating"><br><br>
        <button type="submit">Enregistrer</button>
    </form>
</body>
</html>
