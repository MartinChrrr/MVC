<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $description ?>">

    <title><?= $title ?></title>

</head>
<body>
    <h1>App de merde</h1>
    <form action="./controller/form_controller.php" method="post">
        <div class="error_connexion">Error</div>
        <div class="field dark2">
            <i data-lucide="user-round" class="icon-left"></i>
            <input class="dark2" name="pseudo" type="text" placeholder="Identifiant" required autocomplete="off">
        </div>
        <div class="name-last-name">
            <div class="field dark2">
                <input class="dark2 " name="nom" type="text" placeholder="Nom" required autocomplete="off">
            </div>
            <div class="field dark2">
                <input class="dark2 " name="prenom" type="text" placeholder="Prénom" required autocomplete="off">
            </div>

        </div>
        <div class="field dark2">
            <i data-lucide="mail" class="icon-left"></i>
            <input class="dark2" name="email" type="email" placeholder="email" required autocomplete="off">
        </div>
        <div class="field dark2">
            <i data-lucide="lock-keyhole" class="icon-left"></i>
            <input class="dark2" type="password" name="password" id="password-field" placeholder="Password" required autocomplete="off">
            <i data-lucide="eye-off" class="icon-password" onclick="showPswrd()"  id="eye"></i>
        </div>
        
            <div class="connexion-button primary500">
                <input type="submit" name="signup" class="primary500" placeholder="S'inscrire">
            </div>
        
        <div class="link-connexion medium-regular">
            Vous avez déjà un compte ? <a href="index.php?page=connexion">Se connecter</a>
        </div>
        
    </form>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="./view/toggle.js"></script>
    <script>
      lucide.createIcons();
    </script>
</body>
</html>