<?php
require 'template/header.php';
?>
<main>

<div class="schearch">

    <div class="schearch shadow p-3 bg-body rounded">

        <div>
            <h1 class="form-check form-check-inline">Voir les offres</h1>
            <!--
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
                <label class="form-check-label" for="inlineRadio1">Offres</label>
            </div>
            
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                <label class="form-check-label" for="inlineRadio2">Demandes</label>
            </div>
            -->
        </div>
 
        <nav class="navbar btn-light rounded">
            <div class="container-fluid">
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                    <option selected>Catégories</option>
                    <option value="1">Natation</option>
                    <option value="2">Cyclisme</option>
                    <option value="3">Tennis</option>
                </select>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Que recherchez-vous ?" aria-label="Search">
                    <input class="form-control me-2 " type="search" placeholder="Saisissez une ville" aria-label="Search">
                    <button class="btn btn-light btn-outline-success" type="submit">Rechercher</button>

                </form>
            </div>
        </nav>

    </div>
</div>


</main>


<?php
require 'template/footer.php';
?>