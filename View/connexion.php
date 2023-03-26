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
            $error = "<p>Email ou mot de passe incorrect</p>";
        }
    } else {
        $error = "Tous les champs doivent être remplis";
    }
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include "include/head.php"; ?>
</head>




<body>


    <div class="container col-xl-10 col-xxl-8 px-4 py-5">

        <div class="row align-items-center g-lg-5 py-5">
            <div class="col-lg-7 text-center text-lg-start">
                <h1 class="display-4 fw-bold lh-1 mb-3">Pas encore Connecter ? </h1>

                <div>
                    <img src="../image/lbc.ico" alt="logo" class="rounded opacity-75" style="width: 45%">
                </div>
            </div>
            <div class="col-md-10 mx-auto col-lg-5">

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
                            <h6 class="alert-header text-danger">Erreur</h6>
                            <p class="mb-0"><?= $error ?></p>
                        </span>
                    </div>
                <?php endif; ?>

                <form class="p-4 p-md-5 border rounded-3 bg-light" action="" method="post">
                    <div class=""> <!-- formulaire de connexion -->
                        <label for="exampleInputEmail">Adresse mail</label>
                        <div class="input-group">
                            <input type="text" name="email" class="form-control form-control-lg border-left-0" id="" placeholder="Adresse mail">
                        </div>
                    </div>
                    <div class="">
                        <label for="exampleInputPassword">Mot de passe</label>
                        <div class="input-group">
                            <input type="password" name="mdp" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Mot de passe">
                        </div>
                    </div>
                    <div class="my-3 text-center">
                        <input type="submit" name="submit" class="btn btn-warning btn-lg btn-block" value="Connexion">
                    </div>
                    <div class="text-center mt-4"> Vous n'avez pas de compte ? <a href="inscription.php" class="text-danger">Inscrivez-vous</a> <!-- redirection vers la page inscription -->
                    </div>
                    <small class="text-muted">
                        En cliquant sur S'inscrire, vous acceptez les conditions d'utilisation.</small>
                </form>
            </div>
        </div>
    </div>







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