<?php

// Accès cors-origin
header("Access-Control-Allow-Origin: https://simplon-project-1bdc1.web.app/");

// vérifie si requete http == GET
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    
    // chargement du fichier de connexion à la base de données
    require('./config/database.php');


    $sql_query = "SELECT * FROM simplon_participant ORDER BY nom_participant ASC";
    $statement = $pdo->prepare($sql_query);
    $statement->execute();
    $participant = $statement->fetchAll();

    $response = ["participant" => $participant];

    // conversions des données au format json
    header('Content-Type:application/json');
    echo json_encode($response);
}
