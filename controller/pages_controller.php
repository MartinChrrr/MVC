<?php
require_once "models/pdo_model.php";
require_once "controller/verification_controller.php";
require_once "controller/utilities.php";

function ProfilePage() {
    
    $profil = ConnexionID();

    $datas = [
        "description" => "Profil ",
        "title" => "Profil utilisateur",
        "view" => "view/profil_page.php",
        "layout" => "view/layout.php",
    ];
    
    DrawPage($datas);
}

function ConnexionPage() {
    $datas = [
        "description" => "Page de connexion ",
        "title" => "Connexion",
        "view" => "views/connexion_page.php",
    ];
    DrawPage($datas);

}

function InscriptionPage(){
    $datas = [
        "description" => "Page d'inscription ",
        "title" => "Inscription",
        "view" => "views/signup_page.php",
    ];
    DrawPage($datas);

}
