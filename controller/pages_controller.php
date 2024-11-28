<?php
require_once ("models/pdo_model.php");
require_once ("controller/verification_controller.php");
require_once ("controller/utilities.php");
require_once "models/global_raw_array.php";
require_once "./models/games_model.php";


function ModifyPage() {
    $pseudo = ConnexionPseudo();
    $id = GetIDFromProfil($pseudo);
    $datas = [
        "description" => "Modifie ton profil",
        "title" => "Modifie ton profil",
        "view" => "view/modify_page.php",
        "layout" => "view/layout.php",
        "pseudo" => $pseudo,
        "gender" => "",
        "games" => "",
    ];
}

function SignupGames(){
    $pseudo = ConnexionPseudo();
    $id = GetIDFromProfil($pseudo);
    $datas = [
        "description" => "En sélectionnant tes jeux préférés tu trouveras plus d'amis ",
        "title" => "Selectionne tes jeux préférés",
        "view" => "views/connexion_page.php",
        "games" => 
    ];
}

function ProfilePage() {
    
    $pseudo = ConnexionPseudo();
    $id = GetIDFromProfil($pseudo);

    $datas = [
        "description" => "Page de profil",
        "title" => "Profil utilisateur",
        "view" => "view/profil_page.php",
        "layout" => "view/layout.php",
        "pseudo" => $pseudo,
        "profil" => "",
        "games" => "",
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
    //$pseudo = "Anna";
    $pseudo = ConnexionPseudo();
    $id = GetIDFromProfil($pseudo);
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
    //$pseudo = "Anna";
    $pseudo = ConnexionPseudo();
    $id = GetIDFromProfil($pseudo);
    $datas = [
        "description" => "Remplis tes préférences de jeux",
        "title" => "Remplis ton profil",
        "view" => "views/signup3_page.php",
        "horaire" => GetHoraire(),
        "tags" => GetTags(),
    ];
    DrawPage($datas);
}