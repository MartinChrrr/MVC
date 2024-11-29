<?php

//define('__ROOT__', dirname(dirname(__FILE__)));
require_once (__ROOT__ ."\models\pdo_model.php");
require_once(__ROOT__. "\models\login_model.php");
session_start();

function ConnexionID() {

    if ($_SESSION['id'] != null && $_SESSION['id'] != "" && $_SESSION['nom_utilisateur'] != null && $_SESSION['nom_utilisateur'] != "") {
        // Contenu de votre page
        $id = $_SESSION['id'];
        //echo "bien";
    } else {
        // On retourne sur la page de connexion d'un utilisateur
        //echo "pas bien";
        header("Location:index.php?page=connexion");
    }
    return $id;
}

function ConnexionPseudo() {
    
    if ($_SESSION['token'] == GetToken($_SESSION['nom_utilisateur'])  && $_SESSION['nom_utilisateur'] != null && $_SESSION['nom_utilisateur'] != "") {
        // Contenu de votre page
        $pseudo = $_SESSION['nom_utilisateur'];
        return $pseudo;
        //echo "bien";
    } else {
        // On retourne sur la page de connexion d'un utilisateur
        //echo "pas bien";
        echo($_SESSION['token'] == GetToken($_SESSION['nom_utilisateur'])  && $_SESSION['nom_utilisateur'] 
        != null && $_SESSION['nom_utilisateur'] != "");
        //$pseudo = $_SESSION['nom_utilisateur'];
        //return $pseudo;
        //header("Location:index.php?page=connexion");
    }
    
}
