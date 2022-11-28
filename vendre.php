<?php
require 'template/head.php';
?>

<link rel="stylesheet" href="/css/vendre_style.css">

<?php
require 'template/header.php';
?>
<main>
<div class="container">

    <div id="vendre">
        <h1 class="title">Ajoutez une annonce</h1>
        <p class="paragraphe">
            Veuillez remplir tous les champs afin de pouvoir mettre en ligne votre annonce
        </p>
        <form class="formulaire">

            <div class="group-form">

                <input type="text" placeholder="Qu'elle titre souhaitez-vous mettre ?">

            </div>

            <div class="group-form">

                <label for="pet-select"></label>
                <select name="choix">

                    <option value="">Saisir la catégorie de votre article </option>
                    <option value="Jog">Survêtement</option>
                    <option value="T-shirt">T-shirt</option>
                    <option value="Chaussure">Chaussure</option>
                    <option value="Pull">Pull</option>

                </select>


            </div>

            <div class="group-form">

                <label for="pet-select"></label>
                <select name="choix">

                    <option value="">Saisir la marque de votre article </option>
                    <option value="Nike">Nike</option>
                    <option value="Hunder">Hunder Armour</option>
                    <option value="Addidas">Adidas</option>
                    <option value="Autre">Autre</option>

                </select>



            </div>

            <div class="group-form">


                <label for="pet-select"></label>
                <select name="choix">

                    <option value="">Choissisez la Taille </option>
                    <option value="Small">S</option>
                    <option value="Medium">M</option>
                    <option value="Large">L</option>

                </select>



            </div>


            <div class="group-form">
                <h4>Image</h4>
                <input type="file">


            </div>


            <div class="group-form">
                <input type="number" placeholder="Prix en €">

            </div>

            <div class="group-form">
                <input type="submit" class="ligne" value="Mettre en ligne">
            </div>
        </form>
    </div>
</div>
</main>

<?php
require 'template/footer.php';
?>