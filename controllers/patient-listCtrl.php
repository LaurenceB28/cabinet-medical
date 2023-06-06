<?php
require_once __DIR__ . '/../models/Patient.php';
$styleSheet = 'stylesheet.css';
// $patient = new Patient;
try {
    $patientList = Patient::patientList();

} catch (\Throwable $th) {
    var_dump($th);
}


include(__DIR__ . '/../views/templates/header.php');
    include(__DIR__ . '/../views/patient/patients-list.php');
include(__DIR__ . '/../views/templates/footer.php');