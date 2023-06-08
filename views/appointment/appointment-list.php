<?php

?>

<div class="container-fluid" id="logo">
    <a class="logo" href="">
        <img src="/public/assets/img/logo.png">
    </a>
</div>
<h3>Liste des Rendez-vous</h3>
<table class="table table-hover">
    <thead>
        <tr class="table-dark">
            <!-- <th scope="row">Dark</th> -->
            <td>Patient</td>
            <td>Jour du Rendez-vous</td>
            <td>Heure du Rendez-vous</td>
        </tr>
    </thead>
    <tbody>
        <?php
foreach ($appointmentsList as $appointment) {?>
    <tr class="table-light">
                <td><?= $appointment->$idPatients ?></td>
                <td><?= $appointment->$dateHour ?></td>
            </tr>
        <?php } ?>
        <td><a href="/controllers/add-appointmentCtrl.php?id=<?=$appointment?>" class="btn btn-primary">Modification</a></td>
                    <!-- <td><a class="btn btn-danger">Suppression</a></td> -->
    </tbody>
</table>