<?php 








    // if(isset($_FILES['image'])) {
        
    //     $target_dir = "./images/profile/";
    //     $target_file = $target_dir . basename($_FILES["image"]["name"]);
    //     $uploadOk = 1;
    //     $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    //     // Check if image file is a actual image or fake image
    //     if (isset($_POST["submit"])) {
    //         $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    //         if ($check !== false) {
    //             echo "File is an image - " . $check["mime"] . ".";
    //             $uploadOk = 1;
    //         } else {
    //             echo "File is not an image.";
    //             $uploadOk = 0;
    //         }
    //     }
    // }

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $description ?>">
    <link rel="stylesheet" href="style/style.css">

    <title><?= $title ?></title>

</head>

<body>
    <h1>App de merde</h1>
    <form action="controller/form_controller.php" method="post">

        <p>Pseudo</p>
        <div class="field dark2">

            <input class="dark2" name="pseudo" type="text" value="<?php  ?>" required
                autocomplete="off" disabled>
        </div>
        <p>Genre</p>
        <div class="field dark2">
            <select class="dark2" name="gender">
                <?php
                foreach($genders as $gender) {
                    echo DrawGenderOption($gender);
                }
                ?>


            </select>
        </div>



        <p>Image</p>
        <div class="field dark2">

            <input class="dark2" type="file" accept="image/*" name="image">

        </div>



        <p>Date de naissance</p>
        <div class="field dark2">

            <input class="dark2" type="date" name="birthday" >

        </div>

        <p>Bio</p>
        <div class="field dark2">
            <textarea class="dark2" type="text" name="bio" placeholder="Ecriver une bio." rows="5"></textarea>
        </div>

        <p>Stream</p>
        <div class="field dark2">
            <textarea class="dark2" type="text" name="stream" placeholder="Ton lien Twitch" rows="1"></textarea>
        </div>


        <div class="connexion-button primary500">
            <input class="primary500" name="signup2" type="submit" placeholder="Continuer">
        </div>



    </form>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="./view/toggle.js"></script>
    <script>
        lucide.createIcons();
    </script>
</body>

</html>