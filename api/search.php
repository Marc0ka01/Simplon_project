<?php

// Accès cors-origin
header('Access-Control-Allow-Origin: https://simplon-project-1bdc1.web.app/');

// vérifie si la requête HTTP est de type GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    // chargement du fichier de connexion à la base de données
    require('./config/database.php');
    
    // récupération de la valeur de recherche depuis les paramètres de requête
    $search = htmlentities($_GET["search"]);

    // vérification de la longueur de la requête de recherche
    if (strlen($searchQuery) >= 2) {
        // requête SQL pour filtrer les participants en fonction de la recherche
        $sql_query = "SELECT * FROM simplon_participant 
                      WHERE nom_participant LIKE :search 
                      OR prenom_participant LIKE :search 
                      OR mail_participant LIKE :search
                      OR numero_participant LIKE :search
                      ORDER BY nom_participant ASC";

        // préparation de la requête avec PDO
        $statement = $pdo->prepare($sql_query);
        $statement->execute([":search"=>$search]);
        $participants = $statement->fetchAll();

        $response = ["participants" => $participants];
    } else {
        // requête SQL pour obtenir tous les participants
        $sql_query = "SELECT * FROM simplon_participant ORDER BY nom_participant ASC";

        // exécution de la requête
        $statement = $pdo->prepare($sql_query);
        $statement->execute();
        $participants = $statement->fetchAll(PDO::FETCH_ASSOC);

        $response = ["participants" => $participants];
    }

    // conversion des données au format JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}
