<?php

?>

<div class="container-fluid" id="logo">
    <a class="logo" href="">
        <img src="/public/assets/img/logo.png">
    </a>
</div>
<h3>Liste des Rendez-vous</h3>
<table class="table table-hover">
<div>
            <button type="button" id="addPatient" class="sticky btn btn-lg btn-info">
                <a href="/controllers/add-appointmentCtrl.php" id="add-btn">Ajouter</a>
            </button>
        </div>
    <thead>
        <tr class="table-dark">
            <!-- <th scope="row">Dark</th> -->
            <td>Nom</td>
            <td>Prénom</td>
            <td>Date et heure du RDV</td>
            <td>Modification</td>
            <td>Supprimer</td>




        </tr>
    </thead>
    <tbody>
        <?php
foreach ($appointmentsList as $patient) {?>
    <tr class="table-light">
                <td><?= $patient->firstname ?></td>
                <td><?= $patient->lastname ?></td>
                <td><?= $patient->dateHour ?></td>
                <td><a href="/controllers/appointmentCtrl.php?id=<?=$patient->id?>" class="btn btn-primary">Modification</a></td>
                <td><button type="submit" name="deletePatient" value="<?= $patient->id ?>" class="btn btn-outline-danger rounded">Supprimer</button></td>
            </tr>
        <?php } ?>
    </tbody>
</table>