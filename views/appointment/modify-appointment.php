<div class="container-fluid" id="logo">
        <a class="logo" href="">
            <img src="/public/assets/img/logo.png"> 
        </a>
    </div>

<h3>Modifier le rendez-vous</h3>
<form method="post">
    <div class="form-group">
        <label for="exampleSelect1" class="form-label mt-4">Patient</label>
        <select class="form-select" name="idPatients" id="exampleSelect1">
            <?php foreach ($patientList as $patient) {
                    if ($patient->id == $appointmentInfo->idPatients) {
                        $isSelected= 'selected';
                    }else{
                        $isSelected = '';
                    }
                    // ou $isSelected = ($patient->id == $appointmentInfo->idPatients) ? 'selected' : '';
                    ?>
                
                <option value="<?= $patient -> id ?>" <?= $isSelected ?>><?= $patient -> lastname . ' ' . $patient -> firstname ?></option>
        <?php }?>
        </select>
    </div>
    <div class="mb-3">
        <label for="exampleSelect1" class="form-label mt-4">Date du rendez-vous</label>
        <input type="date" id="date" name="date" value="<?= date('Y-m-d', strtotime($appointmentInfo->dateHour))?>" required>
        <small id="dateHelp" name="date" class="form-text error"><?= $error['date'] ?? '' ?></small>
    </div>
    <div class="mb-3">
        <label for="exampleSelect1" class="form-label mt-4">Heure du rendez-vous</label>
        <input id="hour" type="time" name="hour" value="<?= date('H:i', strtotime($appointmentInfo->dateHour)) ?>" required>
        <small id="hourHelp" name="hour" class="form-text error"><?= $error['hour'] ?? '' ?></small>
    </div>
    <button type="submit" class="btn btn-info">Valider</button>
    <!-- <?= $message ?> -->
</form>