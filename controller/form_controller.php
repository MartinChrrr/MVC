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
                header("Location: ./index.php?page=profilPage");
            } else {
                //pseudo or password incorrect
                
       
            }
        }
    } else if (isset($_POST['signup2'])) {
        $pseudo = $_POST["pseudo"];
        $gender = $_POST["gender"];
        $birthday = date('Y-m-d' ,strtotime($_POST["birthday"]));
        $bio = $_POST["bio"];
        $stream = $_POST["stream"];
        if(isset($_FILES['image'])) {
            // $img_name = $_FILES['image']['name'];
            // $img_type = $_FILES['image']['type'];
            // $tmp_name = $_FILES['image']['tmp_name'];
    
            // $img_explode = explode('.', $img_type);
            // $img_end = end($img_explode);
            $target_dir = "./images/profile/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            if($_SESSION['pseudo'] == $pseudo){
                if(ProfilUpdate($bio, $birthday, $stream, $gender, $pseudo)) {
                    header("Location: ./index.php?page=inscription3");
                }
            }
        }
    } else if (isset($_POST['signup3'])) {
        $pseudo = $_SESSION['pseudo'];
        $horaire = $_POST["player-horaire"];
        $playerTags = $_POST["player-tags"];
        
        $str_horaire = implode(" ",$horaire);
        $str_tags = implode(" ",$playerTags);
        if(ProfilUpdateTags($str_horaire, $str_tags, $pseudo)) {
            header("Location: ./index.php?page=profilePage");
        }
    }
}