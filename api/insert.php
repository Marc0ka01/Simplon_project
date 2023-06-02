<?php

// Accès cors-origin
header("Access-Control-Allow-Origin: *");

// vérifier si requete == POST
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // chargement du fichier de connexion à la base de données
    require('./config/database.php');

    // déclaration des variables
    $nom_participant = htmlentities(strtoupper($_POST['nom']));
    $prenom_participant = htmlentities(strtoupper($_POST['prenom']));
    $mail_participant = htmlentities(strtolower($_POST['mail']));
    $numero_participant = htmlentities($_POST['numero']);

    // Vérification de l'existence de l'utilisateur
    $sql_query_check = "SELECT COUNT(*) AS count FROM simplon_participant WHERE nom_participant = :nom AND prenom_participant = :prenom AND mail_participant = :mail";
    $stmt_check = $pdo->prepare($sql_query_check);
    $stmt_check->execute([
        ":nom" => $nom_participant,
        ":prenom" => $prenom_participant,
        ":mail" => $mail_participant,
    ]);
    $count = $stmt_check->fetch(PDO::FETCH_ASSOC)['count'];

    if ($count > 0) {
        // L'utilisateur existe déjà, renvoyer un message approprié
        $response = [
            "status" => false,
            "message" => "L'utilisateur existe déjà"
        ];
    } else {
        // L'utilisateur n'existe pas, effectuer l'insertion
        $data = [
            ":nom" => $nom_participant,
            ":prenom" => $prenom_participant,
            ":mail" => $mail_participant,
            ":numero" => $numero_participant
        ];
        $sql_query_insert = "INSERT INTO simplon_participant(nom_participant, prenom_participant, mail_participant, numero_participant) VALUES(:nom, :prenom, :mail, :numero)";
        $stmt_insert = $pdo->prepare($sql_query_insert);
        $exe = $stmt_insert->execute($data);

        if ($exe) {
            $response = [
                "status" => true,
                "message" => "Insertion effectuée avec succès"
            ];
        } else {
            $response = [
                "status" => false,
                "message" => "Enregistrement échoué"
            ];
        }
    }

    echo json_encode($response);
}
