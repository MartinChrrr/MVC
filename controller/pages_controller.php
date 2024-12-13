<?php
define('__ROOT__', dirname(dirname(__FILE__)));
//static $root = dirname(dirname(__FILE__));
//var_dump(__ROOT__);
require_once ("models/pdo_model.php");
require_once ("controller/verification_controller.php");
require_once ("controller/utilities.php");
require_once "models/global_raw_array.php";
require_once "./models/games_model.php";
require_once(__ROOT__."/models/profile_models.php");



function ModifyPage() {
    $pseudo = ConnexionPseudo();
    var_dump($pseudo);
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
    echo "test";
    $games = GetAllGames();
    $datas = [
        "description" => "En sélectionnant tes jeux préférés tu trouveras plus d'amis ",
        "title" => "Selectionne tes jeux préférés",
        "view" => "views/signup_games_page.php",
        "games" => $games,
    ];
    DrawPage($datas);
}

function ConversationPage() {
    $pseudo = ConnexionPseudo();
    $id = GetIDFromProfil($pseudo);
    $conversations = GetAllConversation($id);
    $datas = [
        "description" => "Ici tu trouves toutes tes conversations",
        "title" => "Liste de tes conversations",
        "view" => "views/conversation_list.php",
        "conversations" => $conversations,
    ];
}

function ProfilePage() {
    //session_start();  

    $pseudo = ConnexionPseudo();
    $id = GetIDFromProfil($pseudo);
    $profil = GetProfile($id);
    $age = null;
    if($profil[0]["birthday"] != null) {
        $age = GetAge($profil[0]["birthday"]);
    }
    $tags = explode(" ", $profil[0]["tags"]);
    $horaires = explode(" ", $profil[0]["horaires"]);
    $games = GetGamesFromID($id);
    if($games == null) {
        $games = array();
    }
    if($tags == null) {
        $tags = array();
    }
    if($horaires == null) {
        $horaires = array();
    }

    $datas = [
        "description" => "Page de profil",
        "title" => "Profil utilisateur",
        "view" => "views/profil_page.php",
        "pseudo" => $pseudo,
        "profil" => $profil[0],
        "tags" => $tags, 
        "horaires" => $horaires,
        "games" => $games,
        "age" => $age,
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