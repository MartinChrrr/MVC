<?php
    require_once(__ROOT__ . "/views/components/buttons.php");
    var_dump($games);
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
    <form action="./controller/form_controller.php" method="POST">
        <div class="liste-jeux">

    <?php
    echo $_SESSION["nom_utilisateur"];
    foreach($games as $game) {
        echo DrawGamesButton($game);
    }
?>

        </div>

        <div class="sticky-button primary500">
            <input class="primary500" type="submit" name="jeux" placeholder="Confirmer">
        </div>
</form>
