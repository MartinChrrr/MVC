<?php 
    //define('__ROOT__', dirname(dirname(__FILE__)));
    require_once(__ROOT__ ."/views/components/profile_components.php");
?>

<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?></title>
  <meta name="description" content="<?= $description ?>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <?php var_dump($profil); var_dump($horaires);?>
    <section class="top-bar">
        <h4>Mon Profil</h4>
        <a href="./mesjeux.php" class="button-top-bar">
            <i class="button-top-bar-icon" data-lucide="pen"></i>
        </a>



        
    </section>

    <div class="profil-card">
            <header>
                <!-- <img src=" 
                 <?php //echo $profil["photo"]; ?> 
                 "> -->
                <div class="profil-text">
                    <h5> <?php echo $pseudo; ?> </h5>
                    <div class="tags">
                        <label class="tag">
                            <?php 
                            if($age != null) {
                                echo $age . " ans" ;
                            }
                            
                            ?>
                        </label>
                        <label class="tag">
                            <?php
                            if($profil["genre"] != null) {
                                echo $profil["genre"];
                            }?>
                        </label>
                        <?php
                        if(count($tags) > 0) {
                            foreach($tags as $t) {
                                echo DrawTags($t);
                            }
    
                        }
                        if(count($horaires) > 0){
                            foreach($horaires as $h) {
                                echo DrawHoraireProfile($h);
                                ;
                            }
                        }



                        ?>
                    </div>
                </div>
            </header>
            <p class="bio"> 
                <?php 
                if($profil["biographie"] != null) {
                    echo $profil["biographie"];
                }
                 ?> 
            </p>
            <p class="separation xlarge-semibold">Jeux</p>
            <div class="jeux">
                <ul>
                    <?php 
                        foreach($games as $game) {
                            echo DrawGamesProfile($game);
                        }
                    
                    
                    
                    ?>

                </ul>
            </div>
            <p class="separation xlarge-semibold">Derniers Posts</p>
            <br><br><br><br><br><br>

        </div>

<?php
    include( __ROOT__ ."/views/bar/tabBar.php");
?>
    
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();
    </script>
</body>