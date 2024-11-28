<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <meta name="description" content="<?= $description ?>">

    <title><?= $title?> </title>

</head>

<body>
    <header>
        <h1>Modifie ton profile</h1>
        <!-- <p class="large-regular">Tes futurs amis te trouveront plus facilement <br>en filtrant vos points communs.</p> -->
    </header>
    <form action="controller/form_controller.php" method="post">

    <p>Genre</p>
        <div class="field dark2">
            <select class="dark2" name="genre">


                <option value="panda"             
                <?php
                    if($donneeGenre == "panda") echo " selected ";
                ?>
                >
                Panda</option>
                <option value="humain"
                <?php
                    if($donneeGenre == "humain") echo " selected ";
                ?>
                >
                Humain</option>
                <option value="robot"                 
                <?php
                    if($donneeGenre == "robot") echo " selected ";
                ?>
                >Robot</option>

            </select>
        </div>



        <p>Image</p>
        <div class="field dark2">

            <input class="dark2" type="file" accept="image/*" name="image">

        </div>

<!-- 

        <p>Date de naissance</p>
        <div class="field dark2">

            <input class="dark2" type="date" name="birthday" >

        </div> -->

        <p>Bio</p>
        <div class="field dark2">
            <textarea class="dark2" type="text" name="bio" placeholder="Ecriver une bio." rows="5"><?php echo $profil['biographie'];?></textarea>
        </div>

        <p>Stream</p>
        <div class="field dark2">
            <textarea class="dark2" type="text" name="stream" placeholder="Ton lien Twitch" rows="1"><?php echo $profil['stream'];?></textarea>
        </div>
        <div class="titre_liste">
            <p>Horaires De jeux</p>
            <i class="" id="upHoraire" data-lucide="chevron-up" onclick="ShowOffHoraire()"></i>
            <i class="" id="downHoraire" data-lucide="chevron-down" onclick="Display()"></i>
        </a>
        </div>
        

        <div class="list-checkbox-button dis-no" id="liste_horaire">
        <?php
            for($i = 0; $i < count($key); $i++) {

            }
            ?>


        </div>

        <p>Tags de Jeux</p>

        <div class="list-checkbox-button" id="liste_tags">
            <?php
            for($i = 0; $i < count($tags); $i++) {

            }
            ?>
        </div>
        <br><br>
        

        <div class="connexion-button primary500">
            <input class="primary500" type="submit" name="modify" value="Enregistrer">
        </div>



    </form>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="./view/toggle.js"></script>
    <script>
        lucide.createIcons();
    </script>
</body>

</html>