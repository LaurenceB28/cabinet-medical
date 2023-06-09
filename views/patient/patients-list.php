<div class="container-fluid" id="logo">
    <a class="logo" href="">
        <img src="/public/assets/img/logo.png">
    </a>
</div>

<h3>Liste des patients</h3>

<div>
    <button type="button" id="addPatient" class="sticky btn btn-lg btn-info">
        <a href="/controllers/add-patientCtrl.php" id="add-btn">Ajouter</a>
    </button>
</div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
    <div>
        <button type="button" id="back" class="fixed-bottom btn btn-lg btn-warning">
            <a href="/controllers/patient-listCtrl.php" id="back-btn">Retour</a>
        </button>
    </div>
<?php } ?>
<div>
    <form method="post" class="d-flex" role="search"> <!-- method="post" pour $_SERVER request method, recupère les infos du formulaire ou champ de recherche-->
        <input class="form-control-sm-info" type="search" name="search" placeholder="Rechercher" aria-label="Search">
        <button class="btn btn-outline-info" type="submit">GO!</button>
    </form>
</div>
<div id="results">
    <table class="table table-hover">

        <thead>
            <tr class="table-dark">
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Date de naissance</th>
                <th scope="col">Telephone</th>
                <th scope="col">Email</th>
                <th scope="col">Profil</th>
                <th scope="col">Supprimer</th>
                <th>
            </tr>
        </thead>
        <tbody>
            <?php

            foreach ($patientList as $patient) { ?>
                <tr class="table-light">
                    <th scope="row"><?= $patient->firstname ?></th>
                    <td><?= $patient->lastname ?></td></a>
                    <td><?= date('d/m/Y', strtotime($patient->birthdate)) ?></td>
                    <td><a href="tel:"><?= $patient->phone ?></a></td>
                    <td><a href="mailto="><?= $patient->mail ?></a></td>
                    <td><a href="/controllers/patient-profilCtrl.php?id=<?= $patient->id ?>"><span class="btn btn-outline-info border border-info">Profil</span></a></td>
                    <td><a href="/controllers/patient-listCtrl.php?id=<?= $patient->id ?>"><span class="btn btn-outline-danger border border-danger">Supprimer</span></a></td>
                    <td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <nav>
        <ul class="pagination">
            <li class="page-item <?= ($page == 1) ? "disabled" : "" ?>">
                <a href="/controllers/patient-listCtrl.php?page=<?= $page - 1?>"class="page-link">Précédente</a>
            </li>
            <?php for($page = 1; $page <= $nbrPages; $page++): ?>
            <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
            <li  class="page-item <?= ($page == $page) ? "active" : "" ?>">
                <a id="page" href="/controllers/patient-listCtrl.php?page=<?= $page ?>" class="page-link"><?= $page ?></a>
            </li>
            <?php endfor ?>
            <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
            <li class="page-item <?= ($page == $nbrPages) ? "disabled" : "" ?>">
            <a href="/controllers/patient-listCtrl.php?page=<?= $page + 1 ?>" class="page-link">Suivante</a>
        </li>
        </ul>
    </nav>
