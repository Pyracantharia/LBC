<?php
if (isset($_GET["idcategorie"])) {
    if ($_GET["idcategorie"] == 1) {
        $chaussure = "active";
    } else {
        $chaussure = null;
    }
    if ($_GET["idcategorie"] == 2) {
        $protection = "active";
    } else {
        $protection = null;
    }
    if ($_GET["idcategorie"] == 3) {
        $accessoires = "active";
    } else {
        $accessoires = null;
    }
    if ($_GET["idcategorie"] == 4) {
        $couvre = "active";
    } else {
        $couvre = null;
    }
    if ($_GET["idcategorie"] == 5) {
        $vetements = "active";
    } else {
        $vetements = null;
    }
} else {
    $chaussure = null;
    $protection = null;
    $accessoires = null;
    $couvre = null;
    $vetements = null;
}
if (isset($_POST["search"])) {
    $search = $_POST["search"];
    $statement = $pdo->prepare("SELECT * from annonce where titre like :search");
    $statement->bindValue(':search', "%$search%", PDO::PARAM_STR);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION["search"] = $result;
    header("Location: recherche.php");
}

?>
<header class="p-3 ">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start rounded bg-light">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>

            <a class="navbar-brand brand-logo-mini" href="index.php"><img class="rounded" style="width : 100px " src="../image/lbc.ico" alt="logo" /></a>


            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">


                <li class="nav-item<?= $chaussure ?>">
                    <a class="nav-link" href="categorie.php?idcategorie=1">
                        <i class="fa-solid fa-heart mx-2"></i>
                        <span class="menu-title">Chaussure</span>
                    </a>
                </li>
                <li class="nav-item <?= $protection ?>">
                    <a class="nav-link" href="categorie.php?idcategorie=2">
                        <i class="fa-solid fa-user-secret mx-2"></i>
                        <span class="menu-title">Protection</span>
                    </a>
                </li>
                <li class="nav-item <?= $accessoires ?>">
                    <a class="nav-link" href="categorie.php?idcategorie=3">
                        <i class="fa-solid fa-rocket mx-2"></i>
                        <span class="menu-title">Accessoires</span>
                    </a>
                </li>
                <li class="nav-item <?= $couvre ?>">
                    <a class="nav-link" href="categorie.php?idcategorie=4">
                        <i class="fa-solid fa-feather-pointed mx-2"></i>
                        <span class="menu-title">Couvre-Chef</span>
                    </a>
                </li>
                <li class="nav-item <?= $vetements ?>">
                    <a class="nav-link" href="categorie.php?idcategorie=5">
                        <i class="fa-solid fa-earth-europe mx-2"></i>
                        <span class="menu-title">Vetements</span>
                    </a>
                </li>
            </ul>






            <?php if (isset($uid)) : ?>




                <a class="btn btn-outline-primary"  href="<?php if (isset($uid)) : ?>nvAnnonces.php <?php else : ?> connexion.php <?php endif; ?>">
                    <i class="fa-regular fa-square-plus "></i><span class="menu-title "> Nouvelle Annonce</span>
                </a>
                <li class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">

                    <a class="nav-link " id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="nav-profile-img">
                            <img style="width : 50px; " src="<?php if ($infoUser["avatar"] == null) {
                                                                    echo "../image/avatarbasique.png";
                                                                } else { ?>../<?= $infoUser["avatar"] ?><?php } ?>" alt="image">
                            <span class="availability-status online"></span>
                        </div>
                        <div class="nav-profile-text">
                            <p class="text-black"><?= $infoUser["prenom"] ?> <?= $infoUser["nom"] ?></p>
                        </div>
                        <i class="fa-solid fa-chevron-down mx-1"></i>
                    </a>
                    <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="profil.php">
                            <i class="fa-solid fa-user"></i> Profil</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="deconnexion.php">
                            <i class="fa-solid fa-right-from-bracket"></i> Déconnexion </a>


                        <a class="nav-link text-center text-dark mt-lg-4" href="<?php if (isset($uid)) : ?>mesAnnonces.php <?php else : ?>connexion.php <?php endif; ?>">
                            <i class="fa-solid fa-list">
                                <p style="font-family: 'Courier New', Courier, monospace" class="d-lg-flex d-none note-icon">Mes annonces</p>
                            </i>
                        </a>


                        <a class="nav-link text-center text-dark mt-lg-4 count-indicator" href="<?php if (isset($uid)) : ?>favoris.php <?php else : ?>connexion.php <?php endif; ?>">
                            <i class="fa-regular fa-heart fa-4x">
                                <p style="font-family: 'Courier New', Courier, monospace" class="fw-bold d-none d-lg-flex note-icon">Favoris</p>
                            </i>
                            <?php
                            if (isset($uid)) {
                                $reqNav = $pdo->prepare("SELECT * FROM favoris WHERE idu = ?");
                                $reqNav->execute(array($uid));
                                $count = $reqNav->rowCount();
                                if ($count > 0) {
                                    echo "<span class='count-symbol bg-danger'></span>";
                                }
                            } ?>
                        </a>


                        <a class="nav-link text-center text-dark mt-lg-4" href="<?php if (isset($uid)) : ?>message.php <?php else : ?> connexion.php <?php endif; ?>">
                            <i class="fa-regular fa-comments">
                                <p style="font-family: 'Courier New', Courier, monospace" class="fw-bold d-none d-lg-flex note-icon">Messages</p>
                            </i>
                        </a>



                </li>


        </div>





        </li>

    <?php else : ?>
        <div class="dropdown text-end">
            <a class="nav-link text-center text-dark mt-lg-4" href="connexion.php">
                <i class="fa-regular fa-user"><br>
                    <p style="font-family: 'Courier New', Courier, monospace" class="fw-bold d-none d-lg-flex note-icon">Connexion</p>
                </i>

            </a>
            <ul class="dropdown-menu text-small">



                <li class="nav-item nav-logout ">

                </li>

                <li class="nav-item nav-settings ">

                </li>




            <?php endif; ?>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center mx-2" type="button" data-toggle="horizontal-menu-toggle">
                <i class="fa-solid fa-bars text-dark"></i>
            </button>
        </div>
    </div>
    </div>
</header>





<div>

    <nav class="bottom-navbar" style="background-color: #DFD019">
        <div class="container">
            <ul class="nav page-navigation">

            </ul>
        </div>
    </nav>
</div>