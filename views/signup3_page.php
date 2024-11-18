<?php



//récupération des données
if($_SERVER['REQUEST_METHOD'] == "POST") {

    $horaire = $_POST["player-horaire"];
    $playerTags = $_POST["player-tags"];
    
    $str_horaire = implode(" ",$horaire);
    $str_tags = implode(" ",$playerTags);
    var_dump($str_horaire);
    var_dump($str_tags);

    $sql_insertProfile = "UPDATE profil SET horaires = '$str_horaire',tags = '$str_tags'  WHERE pseudo = '{$id}'";
        if ($connexion->query($sql_insertProfile) === TRUE) {
            header("Location: ./jeux.php");
        }else{
            echo "Erreur : " . $sql_insert . "<br>" . $connexion->error;
        }


}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $description ?>">
    <link rel="stylesheet" href="style/style.css">

    <title><?= $title?></title>

</head>

<body>
    <header>
        <h1>Selectionnes des tags</h1>
        <p class="large-regular">Tes futurs amis te trouveront plus facilement <br>en filtrant vos points communs.</p>
    </header>
    <form action="#" method="post">




        <!-- Horaire de jeux
        <div class="field dark2">
            <select name="horaire" id="cars" multiple>
                <option value="minuit">00h-3h</option>
                <option value="trois">3h-6h</option>
                <option value="six">6h-9h</option>
                <option value="neuf">9h-12h</option>
                <option value="douze">12h-15h</option>
                <option value="quinze">15h-18h</option>
                <option value="dixhuit">18h-21h</option>
                <option value="vinghtun">21h-00h</option>
            </select>
        </div> -->


        <p>Horaires De jeux</p>

        <div class="list-checkbox-button">
        <?php
            for($i = 0; $i < count($key); $i++) {
                echo 
                  "<div class='checkbox-button' onclick=toggleCheckbox('". $key[$i] ."')  >
                        <input type='checkbox' name='player-horaire[]' value='" . $key[$i] ."' id ='". $key[$i] . "' >
                        <label for='" . $key[$i] ."'> ". $values[$i]  ."
                        </label>



                    </div>"
                
                
                ;
            }
            ?>


        </div>

        <p>Tags de Jeux</p>

        <div class="list-checkbox-button">
            <?php
            for($i = 0; $i < count($tags); $i++) {
                echo 
                    "<div class='checkbox-button' onclick=toggleCheckbox('". $tags[$i] ."')>
                        <input type='checkbox' name='player-tags[]' value='" . $tags[$i] ."' id ='". $tags[$i] . "' >
                        <label for='" . $tags[$i] ."'> ". $tags[$i]  ."
                        </label>



                    </div>"
                
                
                ;
            }
            ?>
        </div>
        <br><br>
        

        <div class="connexion-button primary500">
            <input class="primary500" name="signup3" type="submit" placeholder="Continuer">
        </div>



    </form>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="./javascript/selection_button.js"></script>
    <script>
        lucide.createIcons();
    </script>
</body>

</html>