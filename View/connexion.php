<?php
session_start();
include "include/connexion_bdd.php";
if (isset($_POST["submit"])) {
    if (!empty($_POST["email"]) and !empty($_POST["mdp"])) { //vérifie que le formulaire n'est pas vide et récupère les informations saisies
        $email = $_POST["email"];
        $mdp = $_POST["mdp"];
        $mdp = md5($mdp);
        $statement = $pdo->prepare("SELECT * FROM user WHERE mail = :email AND mdp = :mdp"); // récupère les informations depuis la bdd de l'utilisateur qui a ce mail et ce mot de passe
        $statement->execute([':email' => $email, ':mdp' => $mdp]);
        $result = $statement->fetch();
        if ($result) {
            session_start();
            $_SESSION["uid"] = $result["idu"];
            $_SESSION["nom"] = $result["nom"];
            $_SESSION["prenom"] = $result["prenom"];
            header("location:index.php");
        } else {
            $error = "Email ou mot de passe incorrect";
        }
    } else {
        $error = "Tous les champs doivent être remplis";
    }
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Connexion</title>
    <link rel="stylesheet" href="../asset/template/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../asset/template/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../asset/template/assets/css/demo_3/style.css">
    <link rel="shortcut icon" href="../image/lbc.ico" />
    <link rel="stylesheet" href="../asset/template/assets/css/demo_3/style-conn.css">
    <link rel="stylesheet" href="../asset/template/assets/css/demo_3/wave.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/13086b36a6.js" crossorigin="anonymous"></script>

</head>

<body>



    <style>
        @keyframes imagesize {
            from {
                max-height: 50%;
                max-width: 50%;
            }

            to {
                max-height: 100%;
                max-width: 100%;
            }
        }

        * {
            margin: 0;
            padding: 0;
            overflow: auto;
            outline: none;
        }

        .img {
            animation-duration: 1s;
            animation-name: imagesize;
            transition: height 1s, width 1s;
        }

        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }

        .h-custom {
            height: calc(100% - 73px);
        }

        .btn-color {
            background-color: #000078;
            border-color: #000078;
        }

        .alert-error.new {
            background: #f3f8f3;
            border: none;
            border-left: 4px solid #ec1212;
            border-radius: 0;
            box-shadow: 1px 1px 4px rgba(0, 0, 0, .2);
        }

        .alert-error.new.p-4 {
            padding: 0.75rem 0.75rem !important;
        }

        .alert-error.new .fa {
            color: #ec1212;
            display: table-cell;
            text-align: center;
            vertical-align: middle;
            font-size: 40px;
        }

        .alert-error .alert-body {
            padding-left: 0.75rem;
            display: table-cell;
            color: rgba(0, 0, 0, 0.5);
        }

        .alert-error .alert-header {
            font-weight: 700;
            color: #ec1212;
            padding: 0;
            margin: 0;
        }

        .alert-success.new {
            background: #f3f8f3;
            border: none;
            border-left: 4px solid #00b300;
            border-radius: 0;
            box-shadow: 1px 1px 4px rgba(0, 0, 0, .2);
        }

        .alert-success.new.p-4 {
            padding: 0.75rem 0.75rem !important;
        }

        .alert-success.new .fa {
            color: #00b300;
            display: table-cell;
            text-align: center;
            vertical-align: middle;
            font-size: 40px;
        }

        .alert-success .alert-body {
            padding-left: 0.75rem;
            display: table-cell;
            color: rgba(0, 0, 0, 0.5);
        }

        .alert-success .alert-header {
            font-weight: 700;
            color: #00b300;
            padding: 0;
            margin: 0;
        }

        @media (max-width: 450px) {
            .h-custom {
                height: 100%;
            }
        }
    </style>

    <div class="header">

        <!--Content before waves-->
        <div class="">
            
            <!--Just the logo.. Don't mind this-->
            <svg version="1.1" class="logo" baseProfile="tiny" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" xml:space="preserve">
                <path fill="#FFFFFF" stroke="#000000" stroke-width="10" stroke-miterlimit="10" d="M57,283" />

            </svg>
            <div class="">
                <img src="../image/lbc.ico" alt="logo" class="rounded opacity-75">
            </div>
            <?php
            if (isset($_SESSION['inscription'])) { // affiche un message si la session inscription est active, c'est à dire si l'utilisateur est redirigé vers cette page après savoir effectué son inscription
                if ($_SESSION['inscription'] == "ok") { ?>
                    <div class="alert alert-success new p-4">
                        <i class="fa fa-circle-check" aria-hidden="true"></i>
                        <span class="alert-body">
                            <h6 class="alert-header overflow-hidden">Succès</h6>
                            <p class="mb-0">Bravo! Votre inscription a été effectuée avec succès.</p>
                        </span>
                    </div>
                <?php  }
                unset($_SESSION['inscription']);
            }
            if (isset($error)) : ?>
                <div class="alert alert-error new p-4">
                    <i class="fa fa-circle-exclamation" aria-hidden="true"></i>
                    <span class="alert-body">
                        <h6 class="alert-header overflow-hidden">Erreur</h6>
                        <p class="mb-0"><?= $error ?></p>
                    </span>
                </div>
            <?php endif; ?>
            
            <form class="pt-3 flex" action="" method="post">
                <div class=""> <!-- formulaire de connexion -->
                    <label for="exampleInputEmail">Adresse mail</label>
                    <div class="input-group">
                        <div class="input-group-prepend bg-transparent">
                            <span class="input-group-text border-right-0">
                                <i class="mdi mdi-account-outline text-primary"></i>
                            </span>
                        </div>
                        <input type="text" name="email" class="form-control form-control-lg border-left-0" id="" placeholder="Adresse mail">
                    </div>
                </div>
                <div class="">
                    <label for="exampleInputPassword">Mot de passe</label>
                    <div class="input-group">
                        <div class="input-group-prepend bg-transparent">
                            <span class="input-group-text border-right-0">
                                <i class="mdi mdi-lock-outline text-primary"></i>
                            </span>
                        </div>
                        <input type="password" name="mdp" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Mot de passe">
                    </div>
                </div>
                <div class="my-3 text-center">
                    <input type="submit" name="submit" class="btn btn-warning btn-lg btn-block" value="Connexion">
                </div>
                <div class="text-center mt-4"> Vous n'avez pas de compte ? <a href="inscription.php" class="text-danger">Inscrivez-vous</a> <!-- redirection vers la page inscription -->
                </div>
            </form>


        </div>

        <!--Waves Container-->
        <div>
            <svg class="" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                <defs>
                    <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                </defs>
                <g class="parallax">
                    <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
                    <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                    <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                    <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
                </g>
            </svg>
        </div>
        <!--Waves end-->

    </div>
    <!--Header ends-->




    <script src="../asset/template/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../asset/template/assets/js/off-canvas.js"></script>
    <script src="../asset/template/assets/js/hoverable-collapse.js"></script>
    <script src="../asset/template/assets/js/misc.js"></script>
    <script src="../asset/template/assets/js/settings.js"></script>
    <script src="../asset/template/assets/js/todolist.js"></script>
    <script src="../asset/template/assets/js/jquery.cookie.js"></script>

</body>
<div class="foot-around">
<?php include 'include/footer.php'; ?>
</div>
</html>