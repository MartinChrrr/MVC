<?php
define('__ROOT__', dirname(dirname(__FILE__)));

require_once (__ROOT__ ."\models\pdo_model.php");

require_once(__ROOT__ ."\models\login_model.php");



if($_SERVER['REQUEST_METHOD'] == "POST") {
    //Registartion Part

    if(isset($_POST['signup'])) {
        echo "nul";
        $id = uniqid();
        $pseudo = $_POST["pseudo"];
        $name = $_POST["nom"];
        $first_name = $_POST["prenom"];
        $email = $_POST["email"];
        $passwrd = $_POST["password"];
        $password_enc= password_hash($passwrd, PASSWORD_DEFAULT);
        //var_dump($pseudo, $name, $first_name, $email, $passwrd);
        //var_dump(!empty($id) && !empty($pseudo) && !empty($nom) && !empty($prenom) && !empty($email) && !empty($password_enc));
        if(!empty($id) && !empty($pseudo) && !empty($name) && !empty($first_name) && !empty($email) && !empty($password_enc)){
            if( CheckEmailAndPseudo($email,$pseudo) > 0) {
                //email or pseudo already used
                echo "ckopze";
            } else {
                echo "test";
                $token = bin2hex(random_bytes(32));
                if(Signup($id,$email,$pseudo,$password_enc,$name, $first_name, $token)) {
                    session_start();
                    $_SESSION["token"] = $token;
                    $_SESSION['nom_utilisateur'] = $pseudo;
                   
                    header("Location: ./index.php?page=signup2");
                } else {
                    echo "bad";
                }

            }
        }
    } else if (isset($_POST['connexion'])) {
        //Login Part
        $email = $_POST["email"];
        $passwrd = $_POST["password"];

        if(!empty($email) && !empty($passwrd)) {
            if(LoginEmail($email) > 0 && password_verify($passwrd,LoginCheckPassword($email))) {
                $token = bin2hex(random_bytes(32));
                echo "test1";
                $pseudo = GetPseudoFromMail($email);
                session_start();
               
                UpdateToken($token, $pseudo);
                $_SESSION['nom_utilisateur'] = $pseudo;
                $_SESSION['token'] = $token;

                header("Location: ./index.php?page=profilPage");

            } else {
                //pseudo or password incorrect
                echo "nul";
       
            }
        }
    } else if (isset($_POST['signup2'])) {
        session_start();
        $gender = $_POST["gender"];
        $birthday = date('Y-m-d' ,strtotime($_POST["birthday"]));
        $bio = $_POST["bio"];
        $stream = $_POST["stream"];
        $pseudo = $_POST["pseudo"];
        
        //if(isset($_FILES['image'])) {
            // $img_name = $_FILES['image']['name'];
            // $img_type = $_FILES['image']['type'];
            // $tmp_name = $_FILES['image']['tmp_name'];
    
            // $img_explode = explode('.', $img_type);
            // $img_end = end($img_explode);
            //$target_dir = "./images/profile/";
            //$target_file = $target_dir . basename($_FILES["image"]["name"]);
            //$uploadOk = 1;
            //$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if($_SESSION['nom_utilisateur'] == $pseudo){
            echo "test";
            if(ProfilUpdate($bio, $birthday, $stream, $gender, $pseudo)) {
                header("Location: ../index.php?page=signup3");
            }
            //}
        }
    } else if (isset($_POST['signup3'])) {
        session_start();
        $pseudo = $_SESSION['nom_utilisateur'];
        $horaire = $_POST["player-horaire"];
        $playerTags = $_POST["player-tags"];
        
        $str_horaire = implode(" ",$horaire);
        $str_tags = implode(" ",$playerTags);
        if(ProfilUpdateTags($str_horaire, $str_tags, $pseudo)) {
            header("Location: ./index.php?page=profilePage");
        }
    } else if (isset($_POST["jeux"])) {
        $games = $_POST['jeux'];
        if(!empty($jeux)) {
            $pseudo = $_SESSION['pseudo'];
            $id = GetIDFromProfil($pseudo);
            $n = count($games);
            foreach($games as $game) {
                AddGame($game, $id);
            }
            header("Location: ./index.php?page=profilPage");
        }
    } else if (isset($_POST["modifier_jeux"])) {
        $games = $_POST['jeux'];
        if(!empty($games)) {
            $pseudo = $_SESSION['pseudo'];
            $id = GetIDFromProfil($pseudo);
            $n = count($jeux);
            if(DeleteAllGamesFromID($id)){
                foreach($games as $game) {
                    AddGame($game, $id);
                }
                header("Location: ./index.php?page=modify");
            }
        }
    } else if(isset(($_POST['modify'])) ){
        $pseudo = $_SESSION['pseudo'];
        $horaire = $_POST["player-horaire"];
        $playerTags = $_POST["player-tags"];
        $str_horaire = implode(" ",$horaire);
        $str_tags = implode(" ",$playerTags);
        if(UpdateHoraireAndTags($str_horaire, $str_tags,$pseudo)) {
            header("Location: ./index.php?page=profilPage");
        } else {
            echo "connexion échoué";
        }
    }
}