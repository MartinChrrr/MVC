<?php
  require_once ("models/pdo_model.php");
require_once './controller/pages_controller.php';


try {
    $path = explode("/", $_GET['page']);
    $page = $path[0];
    if(isset($path[1])) {
        $other_id = $path[1];
    }
    
    switch($page){
        case "connexion":
            ConnexionPage();
            break;
        case "signup":
            SignupPage();
            break;
        case "signup2":
            SignupPage2();
            break;
        case "signup3":
            SignupPage3();
            break;
        case "profilePage":
            ProfilePage();
            break;
        case "modify":
            ModifyPage();
            break;
        case "modify_games":
            break;
        default:
            ProfilePage();
            break;
    
} 


}catch (Exception $e) {
    echo "Erreur: ". $e -> getMessage();
}