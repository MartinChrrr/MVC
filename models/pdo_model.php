<?php

function SetDb() {

    static $pdo;
    // Paramètres de connexion à la base de données
    $host = 'localhost';  // Remplace par l'hôte de ta base de données
    $dbname = 'mvc';  // Remplace par le nom de ta base de données
    $username = 'root';  // Remplace par ton nom d'utilisateur MySQL
    $password = '';  // Remplace par ton mot de passe MySQL

    if($pdo == null) {
        try {
            // Création de l'objet PDO pour se connecter à la base de données
            $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            // Configuration du mode d'erreur PDO pour afficher les exceptions
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // En cas d'erreur de connexion, afficher un message
            die('Erreur de connexion à la base de données : ' . $e->getMessage());
        }

    }
    return $pdo;
}

