<?php
// create.php

require_once 'db.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $publisher = $_POST['publisher'];
    $rating = $_POST['rating'];

    var_dump($_POST);

    $stmt = $db->prepare('INSERT INTO games (name, publisher, rating, rating_date) VALUES (?, ?, ?, NOW())');
    var_dump($stmt);
    var_dump($stmt->errorInfo());
    $stmt->execute([$name, $publisher, $rating]);

    if ($stmt->rowCount() > 0) {
        header('Location: index.php');
        exit;
    } else {
        echo "Erreur lors de l'insertion des données";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo $_SERVER['DOCUMENT_ROOT']; ?>/css/style.css">
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