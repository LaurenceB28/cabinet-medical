<div id="results">
    <h3 class="text-center">Liste des patients</h3>


    <table class="table table-hover">
        <thead>
            <tr class="table-dark">
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Date de naissance</th>
                <th scope="col">Telephone</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach ($patientList as $patient) { ?>
            <tr class="table-light">
            <th scope="row"><?= $patient->firstname ?></th>
            <td><?= $patient->lastname ?></td>
            <td><?= $patient->birthdate ?></td>
            <td><?= $patient->phone ?></td>
            <td><?= $patient->mail ?></td>
        </tr>
        <?php } ?>
    </tbody>
    </table>
    
    


















    <!-- <?php if ($firstname) { ?>
            <li><strong>Prénom: </strong><?= $firstname ?></li>
        <?php } ?>
        <?php if ($laststname) { ?>
            <li><strong>Nom de famille : </strong><?= $lastname ?></li>
        <?php } ?>
        <?php if ($birthdate) { ?>
            <li><strong>Date de naissance : </strong><?= date('d.m.Y', strtotime($birthdate)) ?></li>
        <?php } ?>
        <?php if ($phone) { ?>
            <li><strong>Numéro de telephone : </strong><?= $phone ?></li>
        <?php } ?>
        <?php if ($email) { ?>
            <li><strong>Email : </strong><?= $email ?></li>
        <?php } ?> -->