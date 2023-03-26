<?php
include 'include/connexion_bdd.php';
// élément php présent sur tout les pages (vérification si sessiion ouvert, connexion bdd etc...)
if (isset($_POST['submit'])) {
    if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['mdp']) && !empty($_POST['mdp2']) && !empty($_POST['numRue']) && !empty($_POST['nomRue']) && !empty($_POST['nomVille']) && !empty($_POST['cp']) && !empty($_POST['tel'])) //vérifie si le formulaire n'est pas vide et récupère toutes les informations saisies par l'utilisateur dans le formulaire
    {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];
        $mdp2 = $_POST['mdp2'];
        $numRue = $_POST['numRue'];
        $nomRue = $_POST['nomRue'];
        $nomVille = $_POST['nomVille'];
        $cp = $_POST['cp'];
        $tel = $_POST['tel'];
        if ($mdp == $mdp2) { //vérifie que le mdp saisi ets le même que celui de confirmation
            if (strlen($mdp) >= 10) { //vérifie la longueur du mdp
                $mdp = md5($mdp); //crypte le mdp
                $statement = $pdo->prepare("SELECT * FROM user WHERE mail = :email"); //récupère les infos de l'utiisateur qui a créée un compte avec cette adresse mail pour vérifier si elle est dejà utilisée ou non
                $statement->bindValue(':email', $email, PDO::PARAM_STR);
                $statement->execute();
                $result = $statement->fetch(PDO::FETCH_ASSOC);
                if (!$result) {
                    $statement = $pdo->prepare("INSERT INTO user VALUES (null,:nom,:prenom,:email,:tel,:mdp,:numRue,:nomRue,:nomVille,:cp,null,0)"); // si l'adresse mail n'est pas utilisé, requêt qui permet d'insérer les données saisies dans la bdd
                    $statement->execute([
                        ':nom' => $nom,
                        ':prenom' => $prenom,
                        ':email' => $email,
                        ':tel' => $tel,
                        ':mdp' => $mdp,
                        ':numRue' => $numRue,
                        ':nomRue' => $nomRue,
                        ':nomVille' => $nomVille,
                        ':cp' => $cp
                    ]);
                    session_start();
                    $_SESSION['inscription'] = "ok";
                    header("location:connexion.php");
                } else {
                    $error = "Cet email est déjà utilisé";
                }
            } else {
                $error = "Le mot de passe doit contenir au moins 10 caractères";
            }
        } else {
            $error = "Les mots de passe ne correspondent pas";
        }
    } else {
        $error = "Tous les champs doivent être remplis";
    }
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include 'include/head.php'; ?>
    <title>Inscription</title>
</head>

<body>


    <div class="px-4 py-5 my-5 text-center">
    <div class="row align-items-center g-lg-5 py-5">
        <!--Content before waves-->
        <div class="">
            <h4>Nouveau ici ?</h4>
            <h6 class="font-weight-light">Rejoignez-nous aujourd'hui ! Cela ne prend que quelques étapes</h6>
            <?php if (isset($error)) : ?>
                <div class="alert alert-error new p-4 mt-2">
                    <i class="fa fa-circle-exclamation" aria-hidden="true"></i>
                    <span class="alert-body">
                        <h6 class="alert-header overflow-hidden">Erreur</h6>
                        <p class="mb-0"><?= $error ?></p>
                    </span>
                </div>
            <?php endif; ?>

        </div>
        <div class="">
            <img src="../image/lbc.ico" alt="logo" class="logo rounded opacity-75">
        </div>
        <div class="text-center mt-4 font-weight-light"> Vous avez déjà un compte ? <a href="connexion.php" class="text-danger">Connexion</a>
        </div>
        <!--Waves Container-->


        <form class="container text-center form-insc" action="" method="post" style="height: 500px"> <!-- formulaire d'inscription-->
            <div class="">
                <label>Nom</label>
                <input type="text" name="nom" class="form-control form-control-lg border-left-0" placeholder="Nom">
            </div>
            <div class="">
                <label>Prénom</label>
                <input type="text" name="prenom" class="form-control form-control-lg border-left-0" placeholder="Prénom">
            </div>
            <div class="">
                <label>Email</label>
                <input type="text" name="email" class="form-control form-control-lg border-left-0" placeholder="Email">
            </div>
            <div class="">
                <label>Téléphone</label>
                <input type="text" name="tel" class="form-control form-control-lg border-left-0" placeholder="Téléphone">
            </div>
            <div class="">
                <label>Numéro de voie</label>
                <input type="text" name="numRue" class="form-control form-control-lg border-left-0" placeholder="Numéro de voie">
            </div>
            <div class="">
                <label>Adresse</label>
                <input type="text" name="nomRue" class="form-control form-control-lg border-left-0" placeholder="Adresse">
            </div>
            <div class="">
                <label>Code postal</label>
                <input type="text" name="cp" class="form-control form-control-lg border-left-0" placeholder="Code postal">
            </div>
            <div class="">
                <label>Ville</label>
                <input type="text" name="nomVille" class="form-control form-control-lg border-left-0" placeholder="Ville">
            </div>
            <div class="">
                <label>Mot de passe</label>
                <input type="password" name="mdp" class="form-control form-control-lg border-left-0" placeholder="Mot de passe">
            </div>
            <div class="">
                <label>Confirmer le mot de passe</label>
                <input type="password" name="mdp2" class="form-control form-control-lg border-left-0" placeholder="Confirmer le mot de passe">
            </div>
            <div class="mt-3 text-center">
                <input type="submit" name="submit" class="btn  btn-warning " value="S'inscrire">
            </div>

        </form>


    </div>





<br><br><br><br><br><br><br><br><br><br><br>


    <?php include 'include/script.php'; ?>



    <?php include 'include/footer.php'; ?>



   


</body>

</html>