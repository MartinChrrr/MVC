<?php
require_once './controller/pages_controller.php';

$path = explode("/", $_GET['page']);
$page = $path[0];

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
        break;
    case "profilePage":
        ProfilePage();
        break;
    case "profilPage.php":
        ProfilePage();
        break;


}