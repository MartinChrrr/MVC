<?php

require_once "models/pdo_model.php";
require_once "models/login_model.php";

if($_SERVER['REQUEST_METHOD'] == "POST") {
    //Registartion Part

    if(isset($_POST['signup'])) {
        $id = uniqid();
        $pseudo = $_POST["pseudo"];
        $name = $_POST["nom"];
        $first_name = $_POST["prenom"];
        $email = $_POST["email"];
        $passwrd = $_POST["password"];
        $password_enc= password_hash($passwrd, PASSWORD_DEFAULT);
    
        if(!empty($id) && !empty($pseudo) && !empty($nom) && !empty($prenom) && !empty($email) && !empty($enc_pass)){
            if( CheckEmailAndPseudo($email,$pseudo) > 0) {
                //email or pseudo already used
            } else {
                if(Signup($id,$email,$pseudo,$password_enc,$name, $first_name)) {
                    $_SESSION['id'] = $id;
                    $_SESSION['nom_utilisateur'] = $pseudo;
                    header("Location: ./index.php?page=signup2");
                } else {
                    echo "bad";
                }

            }
        }
    } else if (isset($_POST['connexion'])) {
        //Login Part
        $pseudo = $_POST["pseudo"];
        $passwrd = $_POST["password"];

        if(!empty($pseudo) && !empty($passwrd)) {
            if(LoginPseudo($pseudo) > 0 && password_verify($passwrd,LoginCheckPassword($pseudo))) {
                
                $_SESSION['id'] = $id;
                $_SESSION['nom_utilisateur'] = $pseudo;
            } else {
                //pseudo or password incorrect
                
       
            }
        }
    } else if (isset($_POST['signup2'])) {
        
    }
}