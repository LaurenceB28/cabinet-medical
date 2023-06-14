<?php
require_once __DIR__ . '/../models/Patient.php';
$styleSheet = 'stylesheet.css';

try {
    $id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

    $patient = Patient::get($id);
    if ($patient == false) {
        throw new Exception('le patient n\'a pas été trouvé');
    }
    
} catch (\Throwable $th) {
    // var_dump($th);
    include __DIR__ . '/../views/templates/header.php';
    include __DIR__ . '/../views/templates/error.php';
    include __DIR__ . '/../views/templates/footer.php';
    die;
}


include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/patient/patient-profil.php';
include __DIR__ . '/../views/appointment/patientListAppointment.php';
include __DIR__ . '/../views/templates/footer.php';
