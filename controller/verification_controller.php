<?php

session_start();

function ConnexionID() {

    if ($_SESSION['id'] != null && $_SESSION['id'] != "" && $_SESSION['nom_utilisateur'] != null && $_SESSION['nom_utilisateur'] != "") {
        // Contenu de votre page
        $id = $_SESSION['nom_utilisateur'];
        //echo "bien";
    } else {
        // On retourne sur la page de connexion d'un utilisateur
        //echo "pas bien";
        header("Location:index.php?page=connexion");
    }
    return $id;
}

