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
            <td>RDVinfos</td>
            <td>Nom</td>
            <td>Prénom</td>
            <td>Date et heure du RDV</td>
            <td>Modifier</td>
            <td>Supprimer</td>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($appointmentsList as $appointment) { ?>
            <tr class="table-light">
            <td><a href="/controllers/patient-appointmentCtrl.php?id=<?= $appointment->idAppointments ?>" class="btn btn-info">RDVinfos</a></td>
                <td><?= $appointment->firstname ?></td>
                <td><?= $appointment->lastname ?></td>
                <td><?= $appointment->dateHour ?></td>
                <td><a href="/controllers/modify-appointmentCtrl.php?id=<?= $appointment->idAppointments ?>" class="btn btn-primary">Modifier</a></td>
                <td><button type="submit" name="deletePatient" value="<?= $appointment->idAppointments ?>" class="btn btn-danger">SuppRDV</button></td>
            </tr>
        <?php } ?>
    </tbody>
</table>