
    <div class="container-fluid" id="logo">
        <a class="logo" href="">
            <img src="/public/assets/img/logo.png"> 
        </a>
    </div>
    <h3>Liste des patients</h3>
    <div id="results">
    <table class="table table-hover">
        <div>
            <button type="button" id="addPatient" class="sticky btn btn-lg btn-info">
                <a href="/controllers/add-patientCtrl.php" id="add-btn">Ajouter</a>
            </button>
        </div>

        <thead>
            <tr class="table-dark">
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Date de naissance</th>
                <th scope="col">Telephone</th>
                <th scope="col">Email</th>
                <th scope="col">Profil</th>
                <th scope="col">Suppimer</th>
                <th>
            </tr>
        </thead>
        <tbody>
            <?php

            foreach ($patientList as $patient) { ?>
                <tr class="table-light">
                    <th scope="row"><?= $patient->firstname ?></th>
                    <td><?= $patient->lastname ?></td></a>
                    <td><?= $patient->birthdate ?></td>
                    <td><a href="tel:"><?= $patient->phone ?></a></td>
                    <td><a href="mailto="><?= $patient->mail ?></a></td>
                    <td><a href="/controllers/patient-profilCtrl.php?id=<?= $patient->id ?>"><span class="btn btn-outline-info border border-info">Profil</span></a></td>
                    <td><button type="submit" name="deletePatient" value="<?= $patient->id ?>" class="btn btn-outline-danger rounded">Supprimer</button></td>
                    <td>
                </tr>
            <?php } ?>
        </tbody>
    </table>





    <!-- <form action="" method="post">
                    <button type="submit" name="deletePatient" value="<?= $patient->id ?>" class="btn btn-outline-danger rounded">Supprimer</button>
                </form> -->