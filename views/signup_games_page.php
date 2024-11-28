<?php
    require("phpLogic/config.php");
    session_start();
    //var_dump($_SESSION);
    if($_SESSION['id'] != null && $_SESSION['id'] != "" && $_SESSION['nom_utilisateur'] != null && $_SESSION['nom_utilisateur'] != "") {
        // Contenu de votre page
        echo "bien";
    }
    else {
        // On retourne sur la page de connexion d'un utilisateur
        echo "pas bien";
        //header("Location:index.php");
    }

    ?>





<?php

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $jeux = $_POST['jeux'];
    if(!empty($jeux)) {
        $n = count($jeux);
        //echo("You selected $n jeux: ");
        $id = $_SESSION['id'];
        for($i=0; $i < $n; $i++)
        {
            //echo($jeux[$i] . " ");
            $jeu = (int)$jeux[$i];
            $sql = "INSERT INTO jouer(id_jeux, id_profil) VALUES ('$jeu', '$id')";
            if ($connexion->query($sql) === TRUE) {
                //echo 'bien';
                header("Location: ./profile.php");
            }
        }
    }
    //var_dump($jeux);
}

?>

<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Business</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./style/style.css">

</head>

<body>
    <header>
        <h1>Selectionnes tes jeux préférés</h1>
        <p class="large-regular">Nous te recommanderons des amis et du contenu <br>en liens avec tes préférences.</p>
    </header>
    <form action="#" method="POST">
        <div class="liste-jeux">

    <?php
    foreach($games as $game) {
        DrawGamesButton($game);
    }
?>

        </div>

        <div class="sticky-button primary500">
            <input class="primary500" type="submit" name="jeux" placeholder="Confirmer">
        </div>
</form>
