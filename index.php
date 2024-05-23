<?php
// Établir une connexion à la base de données MySQL
$serveur = "10.36.0.89";
$utilisateur = "test";
$motDePasse = "Motdepasse_0108";
$baseDeDonnees = "game";

try {
    $mysqlClient = new PDO(
        "mysql:host=$serveur;dbname=$baseDeDonnees;charset=utf8",
        $utilisateur,
        $motDePasse
    );  
} catch(\Exception  $e) {
    echo($e->getMessage());
    die("nooooooo");
}

// Vérifier la connexion
$sth = $mysqlClient->prepare("SELECT name from games ; ");
$sth->execute();
$results = $sth->fetchAll();

// Afficher les noms des jeux
foreach ($results as $row) {
    echo $row['name'] . "<br>";
}
?>