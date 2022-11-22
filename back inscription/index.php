<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulaire d'inscription</title>
    <link rel="stylesheet" href="/Connexion/Connexion.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
</head>

<body>

    <div class="login-form">
        <?php
        if (isset($_GET['login_err'])) {
            $err = htmlspecialchars($_GET['login_err']);

            switch ($err) {
                case 'password':
        ?>
                    <div class="alert alert-danger">
                        <strong>Erreur</strong> mot de passe incorrect
                    </div>
                <?php
                    break;

                case 'email':
                ?>
                    <div class="alert alert-danger">
                        <strong>Erreur</strong> email incorrect
                    </div>
                <?php
                    break;

                case 'already':
                ?>
                    <div class="alert alert-danger">
                        <strong>Erreur</strong> compte non existant
                    </div>
        <?php
                    break;
            }
        }
        ?>


        <form action="connexion.php" method="post">
            <h1>Se connecter</h1>
            <div class="social-media">
                <p><i class="fab fa-google"></i></p>
            </div>
            <p class="choose-email">ou utiliser mon adresse e-mail :</p>


            <div class="inputs">
                <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
                <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
            </div>

            <p class="text-center"><a href="inscription.php">Inscription</a></p>
            <div id="connexion">
                <button type="submit" >Se connecter</button>
            </div>
        </form>

        
    </div>



</body>

</html>