<?php

?>
<div class="container-fluid" id="logo">
    <a class="logo" href="">
        <img src="/public/assets/img/logo.png">
    </a>
</div>
<h3>Nouveau Rendez-vous</h3>
<form>
    <div class="form-group">
        <label for="exampleSelect1" class="form-label mt-4">Patient</label>
        <select class="form-select" id="exampleSelect1">
            <?php foreach ($patientList as $patient) { ?>
                <option><?= $patient->lastname . ' ' . $patient->firstname ?> </option>
            <?php } ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="exampleSelect1" class="form-label mt-4">Date du rendez-vous</label>
        <input type="date" id="dateAppointment" name="dateAppointment" value="<?= $dateAppointment ?? '' ?>" required>
        <small id="dateAppointmentHelp" name="dateAppointment" class="form-text error"><?= $error['dateAppointment'] ?? '' ?></small>
    </div>
    <div class="mb-3">
        <label for="exampleSelect1" class="form-label mt-4">Heure du rendez-vous</label>
        <input id="dateHour" type="time" name="dateHour" value="<?= $dateHour ?>" required>
        <small id="dateHourHelp" name="dateHour" class="form-text error"><?= $error['dateHour'] ?? '' ?></small>
    </div>
    <button type="submit" class="btn btn-info">Valider</button>
    <?= $message ?>
</form>