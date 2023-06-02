<?php
require_once __DIR__.'/../models/Patient.php';
// $patient = new Patient;
$patientList = Patient::patientList();


include(__DIR__ . '/../views/templates/header.php');
    include(__DIR__ . '/../views/patient/patients-list.php');
include(__DIR__ . '/../views/templates/footer.php');