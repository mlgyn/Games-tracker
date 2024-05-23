<?php
// Établir une connexion à la base de données MySQL
$serveur = "localhost:3306";
$utilisateur = "test";
$motDePasse = "Motdepasse_0108";
$baseDeDonnees = "game";

// $connexion = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);
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
$sth = $mysqlClient->prepare("SELECT * from games ; ");
$results = $sth->execute();
print_r($sth->fetchAll());

?>