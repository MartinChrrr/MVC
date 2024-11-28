<?php
require_once "views/components/buttons.php";

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
    <form action="controller/form_controller.php" method="post">
    <div class="list-checkbox-button">

        <?php

            foreach($horaire as $value) {
                echo DrawHoraireButton($value);
            }

            ?>


        </div>

        <p>Tags de Jeux</p>

        <div class="list-checkbox-button">
            <?php
            foreach($tags as $tag) {
                echo DrawTagsButton($tag);
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