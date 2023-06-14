<table class="table table-hover">
        <thead>
            <tr class="table-dark">
                <th scope="col">Liste des RDVs du patient</th>
                <th scope="col">Modifier</th>
                <th scope="col">Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <!-- <?php foreach ($appointmentInfos as $idPatients) { ?> -->
            <tr class="table-light">
            <td scope="row"><?= $appointmentInfos->dateHour ?></td>
                <td><a href="/controllers/modify-appointmentCtrl.php?id=<?= $appointment->idAppointments ?>" class="btn btn-primary">Modifier</a></td>
                <td><button type="submit" name="deletePatient" value="<?= $appointment->idAppointments ?>" class="btn btn-danger">SuppRDV</button></td>
            </tr>
            <?php } ?>
        </tbody>
</table>

        <!-- <div class="card-body">
            <a href="/controllers/modify-appointmentCtrl.php?id=<?= $id ?>" class="btn btn-info">Modifier</a>
        </div> -->
    </div>
</div>