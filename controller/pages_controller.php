<?php
require_once "models/pdo_model.php";
require_once "controller/verification_controller.php";
require_once "controller/utilities.php";
require_once "models/global_raw_array.php";

function ProfilePage() {
    
    $pseudo = ConnexionPseudo();

    $datas = [
        "description" => "Profil ",
        "title" => "Profil utilisateur",
        "view" => "view/profil_page.php",
        "layout" => "view/layout.php",
        "pseudo" => $pseudo,
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

function SignupPage(){
    $datas = [
        "description" => "Page d'inscription ",
        "title" => "Inscription",
        "view" => "views/signup_page.php",
    ];
    DrawPage($datas);

}

function SignupPage2() {
    $pseudo = "Anna";
    //$pseudo = ConnexionPseudo();
    $datas = [
        "description" => "Remplis ton profil",
        "title" => "Remplis ton profil",
        "view" => "views/signup2_page.php",
        "genders" => GetGender(),
        "pseudo" => $pseudo,
    ];
    DrawPage($datas);
}

function SignupPage3() {
    $datas = [
        "description" => "Remplis ton profil",
        "title" => "Remplis ton profil",
        "view" => "views/signup_page.php",
    ];
    DrawPage($datas);
}