<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="NoS1gnal" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Inscription</title>
</head>

<body>
    <div class="login-form">
        <?php
        if (isset($_GET['reg_err'])) {
            $err = htmlspecialchars($_GET['reg_err']);

            switch ($err) {
                case 'success':
        ?>
                    <div class="alert alert-success">
                        <strong>Succès</strong> inscription réussie !
                    </div>
                <?php
                    break;

                case 'password':
                ?>
                    <div class="alert alert-danger">
                        <strong>Erreur</strong> mot de passe différent
                    </div>
                <?php
                    break;

                case 'email':
                ?>
                    <div class="alert alert-danger">
                        <strong>Erreur</strong> email non valide
                    </div>
                <?php
                    break;
                case 'tel_bad':
                ?>
                    <div class="alert alert-danger">
                        <strong>Erreur</strong> mauvais format de telephone (ex: 06 00 00 00 00)
                    </div>
                <?php
                    break;

                case 'email_length':
                ?>
                    <div class="alert alert-danger">
                        <strong>Erreur</strong> email trop long
                    </div>
                <?php
                    break;

                case 'pseudo_length':
                ?>
                    <div class="alert alert-danger">
                        <strong>Erreur</strong> pseudo trop long
                    </div>
                <?php
                case 'already':
                ?>
                    <div class="alert alert-danger">
                        <strong>Erreur</strong> compte deja existant
                    </div>
        <?php

            }
        }
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Connexion | Inscription</title>
            <link rel="stylesheet" href="/Contact/contact.css">
        </head>

        <body>
            <div class="container">
                <div id="connexion">
                    <h1 class="title">De Retour !</h1>
                    <p class="paragraphe">
                        Veuillez entrer vos détails de connexion et démarrez votre journée sur LBC M2L
                    </p>
                    <a href="/Connexion/Connexion.html" class="btn-link connexion">Se connecter</a>
                </div>
                <div id="inscription">
                    <h1 class="title">Créer un compte</h1>
                    <p class="paragraphe">
                        Veuillez remplir tous les champs *
                    </p>



                    <form action="inscription_traitement.php" method="post" class="formulaire">

                        <div class="group-form">
                            <input type="text" name="pseudo" class="form-control" placeholder="Pseudo" required="required" autocomplete="off" placeholder="Entrez votre nom complet *">
                            <div class="icon-user"></div>
                        </div>

                        <div class="group-form">
                            <input input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off" placeholder="Entrez votre mail *">
                            <div class="icon-mail"></div>
                        </div>

                        <div class="group-form">
                            <input type="tel" name="tel" class="form-control" placeholder="telephone" class="form-control" required="required" autocomplete="off" placeholder="Entrez votre numéro ">
                            <div class="icon-tel"></div>
                        </div>

                        <div class="group-form">
                            <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off" placeholder="Mot de passe *">
                            <div class="icon-password"></div>
                        </div>

                        <div class="group-form">
                            <input type="password" name="password_retype" class="form-control" placeholder="Re-tapez le mot de passe" required="required" autocomplete="off" placeholder="Confirmer votre mot de passe *">
                            <div class="icon-password"></div>
                        </div>

                        <div class="group-form">
                            <button type="submit" class="inscription" value="Inscription"></button>
                        </div>
                    </form>



                </div>
            </div>
        </body>

        </html>