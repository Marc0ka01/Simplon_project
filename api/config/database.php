<?php

// Ouvrir une connexion PDO à la base de données
$dbHost = "sql305.epizy.com";
$dbName = "epiz_34341394_simplon";
$dbUser = "epiz_34341394";
$dbPassword = "FAyuXmUcwH";
$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=utf8mb4";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
try {
    $pdo = new PDO($dsn, $dbUser, $dbPassword, $options);
    $pdo->exec("SET NAMES 'utf8'");
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}