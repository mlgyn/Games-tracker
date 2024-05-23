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
if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}

// Routes de l'API
if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_SERVER['REQUEST_URI'] === '/games') {
    handleGetGames();
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['REQUEST_URI'] === '/games') {
    handleAddGame();
} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT' && strpos($_SERVER['REQUEST_URI'], '/games/') === 0) {
    handleUpdateGame();
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE' && strpos($_SERVER['REQUEST_URI'], '/games/') === 0) {
    handleDeleteGame();
} else {
    http_response_code(404);
    echo "Route non trouvée";
}

// Définir la fonction pour récupérer tous les jeux
function handleGetGames() {
    global $connexion;
    $requete = "SELECT * FROM jeux";
    $resultat = $connexion->query($requete);

    if ($resultat->num_rows > 0) {
        $jeux = array();
        while ($ligne = $resultat->fetch_assoc()) {
            $jeux[] = $ligne;
        }
        header('Content-Type: application/json');
        echo json_encode($jeux);
    } else {
        http_response_code(404);
        echo "Aucun jeu trouvé";
    }
}

// Définir la fonction pour ajouter un nouveau jeu
function handleAddGame() {
    global $connexion;
    $donnees = json_decode(file_get_contents('php://input'), true);
    $titre = $donnees['titre'];
    $categorie = $donnees['categorie'];

    $requete = "INSERT INTO jeux (titre, categorie) VALUES (':titre', ':categorie')";
    if ($connexion->query($requete) === TRUE) {
        echo "Nouveau jeu ajouté avec succès";
    } else {
        http_response_code(500);
        echo "Erreur lors de l'ajout du jeu : " . $connexion->error;
    }
}

// Définir la fonction pour mettre à jour un jeu existant
function handleUpdateGame() {
    global $connexion;
    $donnees = json_decode(file_get_contents('php://input'), true);
    $id = intval(substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], '/games/') + 7));
    $titre = $donnees['titre'];
    $categorie = $donnees['categorie'];

    $requete = "UPDATE jeux SET titre='$titre', categorie='$categorie' WHERE id=$id";
    if ($connexion->query($requete) === TRUE) {
        echo "Jeu mis à jour avec succès";
    } else {
        http_response_code(500);
        echo "Erreur lors de la mise à jour du jeu : " . $connexion->error;
    }
}

// Définir la fonction pour supprimer un jeu
function handleDeleteGame() {
    global $connexion;
    $id = intval(substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], '/games/') + 7));

    $requete = "DELETE FROM jeux WHERE id=$id";
    if ($connexion->query($requete) === TRUE) {
        echo "Jeu supprimé avec succès";
    } else {
        http_response_code(500);
        echo "Erreur lors de la suppression du jeu : " . $connexion->error;
    }
}
?>
