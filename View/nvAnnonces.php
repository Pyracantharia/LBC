<?php
include 'include/element.php';

if(isset($_POST["btn"])){ // si le bouton ets cliqué, les informations écrites dans le formulaire sont récupérées
 
    $titre= $_POST["titre"];
    $vendeur=$uid;

    $detail=$_POST["detail"];

    $prix= $_POST["prix"];
    $etat= $_POST["etat"];
    $livraison= $_POST["livraison"];
    $sexe= $_POST["sexe"];
    $marque= $_POST["marque"];
    $categorie= $_POST["categorie"];
    $extensions = array('jpg', 'png', 'gif', 'jpeg', 'PNG');

    if (isset($_FILES['photo']) && !$_FILES['photo']['error']) { //vérifie si le champs photo n'est pas vide 
        $fileInfo = pathinfo($_FILES['photo']['name']);
        if ($_FILES['photo']['size'] <= 2000000) {
            if (in_array($fileInfo['extension'], $extensions)) {
                $chemin = "image/annonce/"."$titre".".png";
                move_uploaded_file($_FILES['photo']['tmp_name'], '../image/annonce/'."$titre.png");
                echo 'Le fichier a été envoyé sur le serveur';
                $time = time();
                $req= $pdo->prepare("insert into annonce values (null,:titre,:vendeur,now(),:detail,:chemin,:categorie,:prix,:etat,0,:livraison,:sexe,:marque,0,:time)"); //requête qui insert dans la bdd les infos saisies dans le formulaire
                $req->execute(array(
                    "titre"=>$titre,
                    "vendeur"=>$vendeur,
                    "detail"=>$detail,
                    "chemin"=>$chemin,
                    "categorie"=>$categorie,
                    "prix"=>$prix,
                    "etat"=>$etat,
                    "livraison"=>$livraison,
                    "sexe"=>$sexe,
                    "marque"=>$marque,
                    "time"=>$time
                ));
                header("location:bravo.php");

            } else {
                echo 'Ce type de fichier est interdit';
            }
        } else {
            echo 'Le fichier dépasse la taille autorisée';
        }
    } else {
        echo 'Une erreur est survenue lors de l\'envoi du fichier';
    }



}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Nouvelle annonce - Great Deal</title>
    <?php include 'include/head.php'; ?>  <!-- header présent sur toutes les pages (connexion avec bootstrap) -->
</head>
<body class="header">
<div>

    <?php include 'include/navigation.php'; ?> <!-- bar de navigation présent sur toute les pages-->
    <!-- partial -->
    <div class="page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper container">


                <div class="row">

                    <div class="grid-margin  stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="fw-bold mb-2 text-black">Ajoutez une nouvelle annonce:</h2>

                                <form enctype="multipart/form-data" action="" method="post"> <!--Formulaire d'ajout d'annonce-->
                                    <div class="mb-4">
                                        <label for="titre" class="form-label text-black">Titre de l'annonce</label>
                                        <input type="text" name="titre" class="form-control form-control-lg" placeholder="Entrez le titre:" />
                                    </div>
                                    <div class="mb-4">
                                        <label for="detail" class="form-label text-black">Choisissez la catégorie:</label>
                                        <select class="form-select mb-3" name="categorie">
                                            <?php
                                            $req=$pdo->query("select * from categorie");
                                            $resultat=$req->fetchAll();
                                            foreach($resultat as $categorie){
                                                echo "<option value='".$categorie["idc"]."'>".$categorie["nomCat"]. "</option><br>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label text-black" for="etat">Selectionnez l'état de votre livre :</label>
                                        <select class="form-select mb-3" name="etat">
                                            <option value="Neuf">Neuf</option>
                                            <option value="Très bon état">Très bon état</option>
                                            <option value="Bon état">Bon état</option>
                                            <option value="Satisfaisant">Satisfaisant</option>
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label text-black" for="livraison">Description :</label>
                                        <input type="text" name="detail" class="form-control form-control-lg" placeholder="Entrez la description:" />
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label text-black">Séléctionnez la marque:</label>
                                        <select class="form-select mb-3" name="marque">
                                            <?php
                                            $req=$pdo->query("select * from marque");
                                            $resultat=$req->fetchAll();
                                            foreach($resultat as $marque){ ?>
                                                <option value='<?= $marque["ide"] ?>'><?= $marque["nomMarque"] ?></option><br>";
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label text-black" for="prix">Prix:</label>
                                        <input type="number" name="prix" class="form-control form-control-lg" placeholder="Entrez le prix:" />
                                    </div>
                                    <div class="mb-4 text-black">Sexe:

                                        <input type="radio" name="sexe" value="1"required>Homme
                                        <input type="radio" name="sexe" value="0">Femme
                                    </div>
                                    <div class="mb-4 text-black">Livraison:

                                        <input type="radio" name="livraison" value="1"required>Oui
                                        <input type="radio" name="livraison" value="0">Non
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label text-black">Entrez la photo:</label>
                                        <input type="file" accept='.png' class="form-control" name="photo" />
                                    </div>
                                    <div class="mb-4">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked/>
                                        <label class="form-check-label" for="flexCheckChecked">J'accepte les conditions général d'utilisateur, les règles de diffusion du site LBC et j'autorise LBC  a diffuser mon annonce.
                                        </label>
                                    </div>
                                    <input style='background-color: #FFE713' class="btn px-5" name="btn" type="submit" value="Enregistrer">
                                </form>

                            </div>
                        </div>
                    </div>


                </div>


            </div>

            <?php include 'include/footer.php'; ?> <!-- footer présent sur toute les pages -->

        </div>
    </div>
</div>

<?php include 'include/script.php'; ?> <!-- script présent sur toute les pages (connexion avec bootstrap) -->

</body>
</html>